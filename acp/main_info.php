<?php
/**
 *
 * Active User Birthdays. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, RTS Software
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace rts\activebirthdays\acp;

/**
 * Active User Birthdays ACP module info.
 */
class main_info
{
	public function module()
	{
		return array(
			'filename'	=> '\rts\activebirthdays\acp\main_module',
			'title'		=> 'ACP_ACTIVE_USER_BIRTHDAYS_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_ACTIVE_USER_BIRTHDAYS_SETTINGS',
					'auth'	=> 'ext_rts/activebirthdays && acl_a_board',
					'cat'	=> array('ACP_ACTIVE_USER_BIRTHDAYS_TITLE')
				),
			),
		);
	}
}
