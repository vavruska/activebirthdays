<?php
/**
 *
 * Active User Birthdays. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, RTS Software
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
    'ACP_ACTIVE_USER_BIRTHDAYS' => 'Number of days for active birthday users (0=all)',
    'ACP_ACTIVE_USER_BIRTHDAYS_EXPLAIN' => 'Maximum number of days since the users has connected to be shown in birthday list.',
    'ACP_ACTIVE_USER_BIRTHDAYS_SETTING_SAVED' => 'Settings have been saved successfully!',
 ));

$lang['BIRTHDAYS'] = "Active User Birthdays";

