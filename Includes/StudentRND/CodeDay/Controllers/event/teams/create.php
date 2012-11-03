<?php

namespace StudentRND\CodeDay\Controllers\event\teams;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class create extends Controllers\EventController
{
    public function before()
    {
        Models\Registrant::current();
    }

    public function __get_index()
    {
        echo CodeDay\Application::$twig->render('teams/create.html.twig');
    }

    public function __post_index()
    {
        if (Models\Team::team_name_used($this->event, $this->request->post('name'))) {
            echo CodeDay\Application::$twig->render('teams/create.html.twig', array(
                                                    'error' => 'Sorry, that name is already in use.'
                ));
        } else {
            $team = Models\Team::create($this->event, $this->request->post('name'));
            $team->join(Models\Registrant::current());
            $this->redirect('/teams/details/' . $team->teamID);
        }
    }
}
