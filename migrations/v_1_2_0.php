<?php
/**
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

namespace ferdcoz\recenttopicsng\migrations;

class v_1_2_0 extends \phpbb\db\migration\migration
{
	public static function depends_on(): array
	{
		return ['\\ferdcoz\\recenttopicsng\\migrations\\v_1_1_0'];
	}

	public function update_data(): array
	{
		return [
			// Let registered users choose the block location in their UCP.
			['permission.permission_set', ['REGISTERED', 'u_rtng_location', 'group']],
		];
	}
}
