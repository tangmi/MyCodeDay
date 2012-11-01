<?php

namespace StudentRND\CodeDay\Controllers\my\teams;

use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Mappings;

class index extends \CuteControllers\Base\Rest
{
    public function before()
    {
        $this->team = new Models\Team($this->positional_args[0]);

        if ($this->request->post('registrantID')) {
            $this->member = new Models\Registrant($this->request->post('registrantID'));
        } else {
            $this->member = Models\Registrant::find_by_name($this->team->event,
                                                            $this->request->post('first_name'),
                                                            $this->request->post('last_name'));
            if (!$this->member) {
                $error = "Not found!";
                include(TEMPLATE_DIR . '/my/teams/edit.php');
            }
        }

        if (!Models\Registrant::current()->on_team($this->team)) {
            throw new \CuteControllers\HttpError(403);
        } else if (Models\Registrant::current() == $this->member) {
            $this->redirect('/teams/' . $this->team->teamID);
        }
    }

    public function __post_add()
    {
        if ($this->member->on_team($this->team)) {
            $error = "They're already here!";
            include(TEMPLATE_DIR . '/my/teams/edit.php');
            exit;
        }

        try {
            $this->team->join($this->member);
            $this->redirect('/teams/' . $this->team->teamID);
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            include (TEMPLATE_DIR . '/my/teams/edit.php');
        }
    }

    public function __post_remove()
    {

        if (!$this->member->on_team($this->team)) {
            $error = "They're not here!";
            include(TEMPLATE_DIR . '/my/teams/edit.php');
            exit;
        }

        try {
            $this->team->depart($this->member);
            $this->redirect('/teams/' . $this->team->teamID);
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            include(TEMPLATE_DIR . '/my/teams/edit.php');
        }
    }
}
