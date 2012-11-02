<?php

namespace StudentRND\CodeDay\Controllers;

use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

/**
 * Controller responsible for the global (www.)?codeday.org page
 */
class index extends \CuteControllers\Base\Rest
{
    public function __get_index()
    {
        echo "LOL COMING SOON";
    }
}
