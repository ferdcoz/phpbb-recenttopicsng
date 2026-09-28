<?php
/**
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

namespace ferdcoz\recenttopicsng\migrations;

class v_1_4_0 extends \phpbb\db\migration\migration
{
	public static function depends_on(): array
	{
		return ['\\ferdcoz\\recenttopicsng\\migrations\\v_1_3_0'];
	}

	public function update_data(): array
	{
		return [
			// Recent topics must never become visible via a role assigned to guests.
			['permission.permission_unset', ['ROLE_USER_FULL', 'u_rtng_view', 'role']],
			// Keep guest access explicitly denied on installations upgrading from earlier fork builds.
			['permission.permission_set', ['GUESTS', 'u_rtng_view', 'group', 0]],
			['permission.permission_set', ['BOTS', 'u_rtng_view', 'group', 0]],
			['permission.permission_set', ['NEWLY_REGISTERED', 'u_rtng_view', 'group', 0]],
		];
	}
}
