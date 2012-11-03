<?php

namespace StudentRND\CodeDay\Controllers\event\admin;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class workshops extends Controllers\EventCrudFormController
{
    public static $template = '';
    public static $model = '\StudentRND\CodeDay\Models\Event\Workshop';
    public $static_values = array();
}

workshops::$template = TEMPLATE_DIR . '/form.php';
