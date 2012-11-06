<?php

namespace StudentRND\CodeDay\Controllers;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

/**
 * Controller base for an event. Automatically infers the event from the domain, and loads it into
 * $this->current_codeday.
 */
class EventCrudFormController extends \CuteControllers\Base\CrudFormController
{
    public function __construct(\CuteControllers\Request $request, $action, $positional_args)
    {
        $this->all_codedays = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                                     ->select('*')
                                                     ->from(Models\Event::$table_name)
                                                     ->order_by('`end_time` DESC'));

        $this->upcoming_codedays = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                                     ->select('*')
                                                     ->from(Models\Event::$table_name)
                                                     ->where('`end_time` > NOW()')
                                                     ->order_by('`start_time` ASC'));

        $this->past_codedays = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                                     ->select('*')
                                                     ->from(Models\Event::$table_name)
                                                     ->where('`end_time` < NOW()')
                                                     ->order_by('`end_time` DESC'));

        $name = $request->request('cd_name');
        $year = $request->request('cd_year');
        $month = $request->request('cd_month');

        $this->event = $this->all_codedays->find_one(function($event) use ($month, $year, $name) {
            if (strtolower($name) != strtolower($event->name)) {
                return FALSE;
            }else if ($month && $year) {
                return (strtolower(date('M Y', $event->start_time)) == strtolower("$month $year"));
            } else {
                return TRUE;
            }
        });

        CodeDay\Application::$event = $this->event;

        $this->static_values = array('eventID' => $this->event->eventID);

        CodeDay\Application::$twig->addGlobal('event', $this->event);
        CodeDay\Application::$twig->addGlobal('is_logged_in', Models\Registrant::is_logged_in());
        if (Models\Registrant::is_logged_in()) {
            CodeDay\Application::$twig->addGlobal('registrant', Models\Registrant::current());
        }

        if (!$this->event) {
            CodeDay\Application::$twig->render('404.html');
        }

        parent::__construct($request, $action, $positional_args);

    }

}
