<?php

namespace StudentRND\CodeDay\Controllers\event\admin;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

/**
 * Controller responsible for the admin index page of a CodeDay event page
 */
class index extends Controllers\EventController
{
    public function before()
    {
        if (!Models\Registrant::current()->is_organizer) {
            throw new \CuteControllers\HttpError(403);
        }
    }

    public function __get_index()
    {
        echo CodeDay\Application::$twig->render('admin.html.twig');
    }

    public function __get_sms()
    {
        echo CodeDay\Application::$twig->render('admin/sms.html.twig');
    }

    public function __post_sms()
    {
        foreach ($this->event->registrants as $registrant) {
            $registrant->send_text($this->request->post('message'));
        }

        $this->redirect('/admin.html');
    }

    public function __get_sync()
    {
        echo CodeDay\Application::$twig->render('admin/sync.html.twig');
    }

    public function __post_sync()
    {
        echo CodeDay\Application::$twig->render('admin/sync.html.twig', array(
            'output' => nl2br("Sync started\n" . $this->event->sync_with_eventbrite() . "Sync complete")
        ));
    }
}
