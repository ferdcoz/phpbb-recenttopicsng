<?php
/**
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

namespace ferdcoz\recenttopicsng\migrations;

class v_1_6_0 extends \phpbb\db\migration\migration
{
	public static function depends_on(): array
	{
		return ['\\ferdcoz\\recenttopicsng\\migrations\\v_1_5_0'];
	}

	public function update_data(): array
	{
		return [
			// Move accounts still carrying the original install defaults to the intended defaults.
			['custom', [[$this, 'update_unmodified_preferences']]],
			['custom', [[$this, 'set_anonymous_defaults']]],
		];
	}

	public function update_unmodified_preferences(): void
	{
		$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_rtng_location = 'RTNG_BOTTOM',
					user_rtng_index_page_qty = 1
				WHERE user_rtng_location = 'RTNG_TOP'
					AND user_rtng_index_topics_qty = 10
					AND user_rtng_index_page_qty = 3";

		$this->db->sql_query($sql);
	}

	public function set_anonymous_defaults(): void
	{
		$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_rtng_location = 'RTNG_BOTTOM',
					user_rtng_index_topics_qty = 10,
					user_rtng_index_page_qty = 1,
					user_rtng_separate_topics_qty = 10,
					user_rtng_separate_page_qty = 3
				WHERE user_id = " . ANONYMOUS;

		$this->db->sql_query($sql);
	}
}
