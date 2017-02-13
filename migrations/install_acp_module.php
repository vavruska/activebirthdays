<?php
/**
 *
 * Active User Birthdays. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, RTS Software
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace rts\activebirthdays\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['active_user_birthdays']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('active_user_birthdays', 0)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_ACTIVE_USER_BIRTHDAYS_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_ACTIVE_USER_BIRTHDAYS_TITLE',
				array(
					'module_basename'	=> '\rts\activebirthdays\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
