<?php

namespace StudentRND\CodeDay\Controllers\event\teams\details;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class membership extends Controllers\EventController
{
    public function before()
    {
        $this->team = new Models\Team($this->positional_args[0]);
        CodeDay\Application::$twig->addGlobal('team', $this->team);

        if ($this->request->method !== 'GET' &&
            !(Models\Registrant::current()->on_team($this->team) ||
             Models\Registrant::current()->is_organizer)) {
            throw new \CuteControllers\HttpError(401);
        }
    }

    public function __post_join()
    {
        $user = Models\Registrant::find_by_name($this->event, $this->request->post('first_name'), $this->request->post('last_name'));

        if ($user) {
            $this->team->join($user);
        } else {
            throw new \Exception('Registrant not found');
        }

        $this->redirect('/teams/details/' . $this->team->teamID);
    }

    public function __post_leave()
    {
        try {
            $user = new Models\Registrant($this->request->post('userID'));
            if ($user && $user->on_team($this->team)) {
                $this->team->leave($user);

                if (count($this->team->registrants) == 0) {
                    $this->team->delete();
                    $this->redirect('/teams.html');
                }
            }
        } catch (\Exception $ex) { }

        $this->redirect('/teams/details/' . $this->team->teamID);
    }
}
