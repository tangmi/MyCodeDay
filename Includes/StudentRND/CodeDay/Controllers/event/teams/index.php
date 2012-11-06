<?php

namespace StudentRND\CodeDay\Controllers\event\teams;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class index extends Controllers\EventController
{
    public function __get_index()
    {
        if (!$this->event->has_started) {
            throw new \CuteControllers\HttpError(404);
        }

        echo CodeDay\Application::$twig->render('teams/index.html.twig');
    }
}
