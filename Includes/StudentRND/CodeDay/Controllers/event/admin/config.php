<?php

namespace StudentRND\CodeDay\Controllers\event\admin;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

/**
 * Controller responsible for the admin config management of a CodeDay event page
 */
class config extends Controllers\EventController
{
    public function __post_update()
    {
        $form = new \FastForms\Form('\StudentRND\CodeDay\Models\Event');

        try {
            $form->update($this->event);
            $this->redirect('/admin.html');
        } catch (\Exception $ex) {
            include(TEMPLATE_DIR . '/error.php');
        }
    }
}
