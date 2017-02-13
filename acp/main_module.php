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
 * Active User Birthdays ACP module.
 */
class main_module
{
	public $u_action;

	public function main($id, $mode)
	{
		global $config, $request, $template, $user;

		$user->add_lang_ext('rts/activebirthdays', 'common');
		$this->tpl_name = 'acp_active_user_birthdays_body';
		$this->page_title = $user->lang('ACP_ACTIVE_USER_BIRTHDAYS_TITLE');
		add_form_key('rts/activebirthdays');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('rts/activebirthdays'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('active_user_birthdays', $request->variable('active_user_birthdays', 0));

			trigger_error($user->lang('ACP_ACTIVE_USER_BIRTHDAYS_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'				=> $this->u_action,
			'ACTIVE_USER_BIRTHDAYS' => $config['active_user_birthdays'],
		));
	}
}
