<?php
/**
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

namespace ferdcoz\recenttopicsng\migrations;

class v_1_3_0 extends \phpbb\db\migration\migration
{
	public static function depends_on(): array
	{
		return ['\\ferdcoz\\recenttopicsng\\migrations\\v_1_2_0'];
	}

	public function update_data(): array
	{
		return [
			// Allow ordinary registered members to adjust the index topic count in their UCP.
			['permission.permission_set', ['REGISTERED', 'u_rtng_index_topics_qty', 'group']],
			// Keep the view permission on group ACLs only, never on a role shared with guests.
			['permission.permission_unset', ['ROLE_USER_FULL', 'u_rtng_view', 'role']],
			// New accounts remain denied until phpBB removes NEWLY_REGISTERED at 3 posts.
			['permission.permission_set', ['NEWLY_REGISTERED', 'u_rtng_view', 'group', 0]],
			['permission.permission_set', ['NEWLY_REGISTERED', 'u_rtng_enable', 'group', 0]],
			// Deny guests and bots explicitly; Registered and stable members are allowed.
			['permission.permission_set', ['GUESTS', 'u_rtng_view', 'group', 0]],
			['permission.permission_set', ['BOTS', 'u_rtng_view', 'group', 0]],
			['permission.permission_set', ['REGISTERED_COPPA', 'u_rtng_view', 'group']],
			['permission.permission_set', ['GLOBAL_MODERATORS', 'u_rtng_view', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_rtng_view', 'group']],
			['config.update', ['rtng_simple_topics_qty', 10]],
			['config.update', ['rtng_simple_page_qty', 1]],
			// Establish the defaults shown in the ACP and copied to new accounts.
			['custom', [[$this, 'set_default_settings']]],
		];
	}

	public function set_default_settings(): void
	{
		$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_rtng_location = 'RTNG_BOTTOM',
					user_rtng_index_topics_qty = 10,
					user_rtng_separate_page_qty = 3
				WHERE user_id = " . ANONYMOUS;

		$this->db->sql_query($sql);
	}
}
