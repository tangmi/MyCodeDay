<?php

namespace StudentRND\CodeDay\Controllers\event\teams\details;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class index extends Controllers\EventController
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

    public function __get_index()
    {
        if (Models\Registrant::is_logged_in() &&
            (Models\Registrant::current()->on_team($this->team) ||
             Models\Registrant::current()->is_organizer)) {
            echo CodeDay\Application::$twig->render('teams/details/edit.html.twig');
        } else {
            echo CodeDay\Application::$twig->render('teams/details/view.html.twig');
        }
    }

    public function __post_index()
    {
        $form = new \FastForms\Form('\StudentRND\CodeDay\Models\Team');
        $form->static_values = array('eventID' => $this->team->eventID);
        if (!Models\Registrant::current()->is_organizer) {
            $form->static_values['video_link'] = $this->team->video_link;
            $form->static_values['presentation_link'] = $this->team->presentation_link;
            $form->static_values['team_picture_url'] = $this->team->team_picture_url;
        }

        $form->update($this->team);
        $this->redirect('/teams/details/' . $this->team->teamID);
    }

    public function __get_disband()
    {
        if ($this->request->method !== 'GET' &&
            !(Models\Registrant::current()->on_team($this->team) ||
             Models\Registrant::current()->is_organizer)) {
            throw new \CuteControllers\HttpError(401);
        }

        echo CodeDay\Application::$twig->render('teams/details/disband.html.twig');
    }

    public function __post_disband()
    {
        $this->team->delete();
        $this->redirect('/teams');
    }
}
