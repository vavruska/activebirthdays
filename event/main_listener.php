<?php
/**
 *
 * Active User Birthdays. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, RTS Software
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace rts\activebirthdays\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Active User Birthdays Event listener.
 */
class main_listener implements EventSubscriberInterface
{
    /** @var \phpbb\config\config $config Config object */
    protected $config;

    /**
     * Constructor
     *
     * @param \phpbb\config\config     $config   Config object
     * @param \phpbb\template\template $template Template object
     */
    public function __construct(\phpbb\config\config $config)
    {
        $this->config = $config;
    }

	static public function getSubscribedEvents()
	{
		return array(
            'core.index_modify_birthdays_sql' => 'index_modify_birthdays_sql'
		);
	}

	/**
	 * Modifies the sql command to get the birthday list
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
    public function index_modify_birthdays_sql($event)
    {
        $days=$this->config['active_user_birthdays'];
        if ($days > 0)
        {
            global $user;
            $user->add_lang_ext('rts/activebirthdays', 'common');
            $sql_ary = $event['sql_ary'];
            $now = time();
            $seen = $now - ($days * 86400);
            $sql_ary['WHERE'] .= " AND u.user_lastvisit > $seen";
            $event['sql_ary'] = $sql_ary;
        }
    }
}
