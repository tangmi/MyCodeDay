<?php

namespace StudentRND\CodeDay\Controllers\my\teams;

use \StudentRND\CodeDay\Models;

class index extends \CuteControllers\Base\Rest
{
    public function before()
    {
        if (count($this->positional_args) > 0 && $this->positional_args[0] !== NULL) {
            $this->team = new Models\Team($this->positional_args[0]);
        }
    }

    public function __get_index()
    {
        if (isset($this->team)) {
            if (Models\Registrant::current()->on_team($this->team)) {
                include(TEMPLATE_DIR . '/my/teams/edit.php');
            } else {
                include(TEMPLATE_DIR . '/my/teams/view.php');
            }
        } else {
            include(TEMPLATE_DIR . '/my/teams/index.php');
        }
    }

    public function __post_index()
    {
        if (!Models\Registrant::current()->on_team($this->team)) {
            throw new \CuteControllers\HttpError(403);
        }

        $name = $this->request->post('name');
        $description = $this->request->post('description');
        $website_link = $this->request->post('website_link');
        $play_link = $this->request->post('play_link');

        if ($name) {
            try {
                $this->team->name = $name;
                $this->team->description = $description;
                $this->team->website_link = $website_link;
                $this->team->play_link = $play_link;
                $this->team->update();
                $this->redirect('/teams/' . $this->team->teamID);
            } catch (\Exception $ex) {
                $error = $ex->getMessage();
                $error .= "\nYour changes were not saved!";
                include(TEMPLATE_DIR . '/my/teams/edit.php');
            }
        } else {
            $error = "I need a name.";
            include(TEMPLATE_DIR . '/my/teams/edit.php');
        }
    }


    public function __get_disband()
    {
        if (!Models\Registrant::current()->on_team($this->team)) {
            throw new \CuteControllers\HttpError(403);
        }

        include(TEMPLATE_DIR . '/my/teams/disband.php');
    }

    public function __post_disband()
    {
        if (!Models\Registrant::current()->on_team($this->team)) {
            throw new \CuteControllers\HttpError(403);
        }
        $this->team->delete();
        $this->redirect('/');
    }

    public function __post_update()
    {
        if (!Models\Registrant::current()->on_team($this->team)) {
            throw new \CuteControllers\HttpError(403);
        }

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
