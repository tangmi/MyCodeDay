<?php

namespace StudentRND\CodeDay\Controllers\event;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

/**
 * Controller responsible for the index page of a CodeDay event page
 */
class index extends Controllers\EventController
{
    public function __get_index()
    {
        echo CodeDay\Application::$twig->render('index.html.twig');
    }

    public function __get_schedule()
    {
        echo CodeDay\Application::$twig->render('schedule.html.twig');
    }

    public function __get_rules()
    {
        echo CodeDay\Application::$twig->render('rules.html.twig');
    }

    public function __get_register()
    {
        echo CodeDay\Application::$twig->render('register.html.twig');
    }

    public function __get_faq()
    {
        echo CodeDay\Application::$twig->render('faq.html.twig');
    }

    public function __get_people()
    {
        if (!$this->event->has_started && (!Models\Registrant::is_logged_in() || !Models\Registrant::current()->is_organizer)) {
            throw new \CuteControllers\HttpError(404);
        }

        echo CodeDay\Application::$twig->render('people/index.html.twig');
    }
}
