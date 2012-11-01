<?php

namespace StudentRND\CodeDay\Controllers\my\teams;

use \StudentRND\CodeDay\Models;

class create extends \CuteControllers\Base\Rest
{
    public function __get_index()
    {
        include(TEMPLATE_DIR . '/my/teams/create.php');
    }

    public function __post_index()
    {
        $name = $this->request->post('name');
        if ($name) {
            try {
                $team = Models\Team::create(Models\Registrant::current()->event, $name);
                $team->join(Models\Registrant::current());
                $this->redirect('/teams/' . $team->teamID);
            } catch (\Exception $ex) {
                $error = $ex->getMessage();
                include(TEMPLATE_DIR . '/my/teams/create.php');
            }
        } else {
            $error = "C'mon, we need a team name.";
            include(TEMPLATE_DIR . '/my/teams/create.php');
        }
    }
}
