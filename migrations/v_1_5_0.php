<?php
/**
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

namespace ferdcoz\recenttopicsng\migrations;

class v_1_5_0 extends \phpbb\db\migration\migration
{
	public static function depends_on(): array
	{
		return ['\\ferdcoz\\recenttopicsng\\migrations\\v_1_4_0'];
	}

	public function update_data(): array
	{
		return [
			// Keep visibility out of shared roles so group-level NEVER has precedence.
			['permission.permission_unset', ['ROLE_USER_FULL', 'u_rtng_view', 'role']],
			['custom', [[$this, 'set_group_permissions']]],
			['config.update', ['rtng_simple_topics_qty', 10]],
			['config.update', ['rtng_simple_page_qty', 1]],
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

	public function set_group_permissions(): void
	{
		$permissions = $this->get_permission_ids(['u_rtng_view', 'u_rtng_index_topics_qty']);
		// The upstream-style setup may have attached this option to a shared role.
		// It is extension-owned and must be controlled only by direct group ACLs.
		$this->db->sql_query('DELETE FROM ' . ACL_ROLES_DATA_TABLE . '
			WHERE auth_option_id = ' . (int) $permissions['u_rtng_view']);

		$groups = [
			'GUESTS' => ['u_rtng_view' => ACL_NEVER],
			'BOTS' => ['u_rtng_view' => ACL_NEVER],
			'NEWLY_REGISTERED' => ['u_rtng_view' => ACL_NEVER],
			'REGISTERED' => [
				'u_rtng_view' => ACL_YES,
				'u_rtng_index_topics_qty' => ACL_YES,
			],
			'REGISTERED_COPPA' => ['u_rtng_view' => ACL_YES],
			'GLOBAL_MODERATORS' => ['u_rtng_view' => ACL_YES],
			'ADMINISTRATORS' => ['u_rtng_view' => ACL_YES],
		];

		foreach ($groups as $group_name => $settings)
		{
			$group_id = $this->get_group_id($group_name);
			foreach ($settings as $permission => $setting)
			{
				$auth_option_id = $permissions[$permission];
				$this->db->sql_query('DELETE FROM ' . ACL_GROUPS_TABLE . '
					WHERE group_id = ' . (int) $group_id . '
						AND forum_id = 0
						AND auth_option_id = ' . (int) $auth_option_id);

				$this->db->sql_query('INSERT INTO ' . ACL_GROUPS_TABLE . ' ' . $this->db->sql_build_array('INSERT', [
					'group_id' => (int) $group_id,
					'forum_id' => 0,
					'auth_option_id' => (int) $auth_option_id,
					'auth_role_id' => 0,
					'auth_setting' => (int) $setting,
				]));
			}
		}
	}

	private function get_group_id(string $group_name): int
	{
		$sql = 'SELECT group_id FROM ' . GROUPS_TABLE . "
				WHERE group_name = '" . $this->db->sql_escape($group_name) . "'";
		$result = $this->db->sql_query($sql);
		$group_id = (int) $this->db->sql_fetchfield('group_id');
		$this->db->sql_freeresult($result);

		if (!$group_id)
		{
			throw new \phpbb\db\migration\exception('GROUP_NOT_EXIST', $group_name);
		}

		return $group_id;
	}

	private function get_permission_ids(array $options): array
	{
		$sql = 'SELECT auth_option, auth_option_id FROM ' . ACL_OPTIONS_TABLE . '
				WHERE ' . $this->db->sql_in_set('auth_option', $options);
		$result = $this->db->sql_query($sql);
		$ids = [];
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ids[$row['auth_option']] = (int) $row['auth_option_id'];
		}
		$this->db->sql_freeresult($result);

		foreach ($options as $option)
		{
			if (!isset($ids[$option]))
			{
				throw new \phpbb\db\migration\exception('AUTH_OPTION_NOT_EXIST', $option);
			}
		}

		return $ids;
	}
}
