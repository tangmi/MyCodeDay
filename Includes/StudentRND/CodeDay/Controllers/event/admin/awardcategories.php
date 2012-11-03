<?php

namespace StudentRND\CodeDay\Controllers\event\admin;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class awardcategories extends Controllers\EventCrudFormController
{
    public function before()
    {
        if (!Models\Registrant::current()->is_organizer) {
            throw new \CuteControllers\HttpError(403);
        }

        parent::before();
    }

    public static $template = '';
    public static $model = '\StudentRND\CodeDay\Models\Event\AwardCategory';
    public $static_values = array();
}

awardcategories::$template = TEMPLATE_DIR . '/form.php';
