<?php

namespace StudentRND\CodeDay\Controllers\event;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class is_local extends Controllers\EventController
{
    public function __get_index()
    {
        return CodeDay\Application::$config['app']['local'] ? 'yes' : 'no';
    }
}
