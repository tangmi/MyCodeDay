<?php

namespace StudentRND\CodeDay\Controllers\my;

use \StudentRND\CodeDay\Models;

class index extends \CuteControllers\Base\Rest
{
    public function before()
    {
        Models\Registrant::current(); // require login
    }

    public function __get_index()
    {
        include(TEMPLATE_DIR . '/my/home.php');
    }

    public function __get_demo()
    {
        include(TEMPLATE_DIR . '/view/home.php');
    }
}
