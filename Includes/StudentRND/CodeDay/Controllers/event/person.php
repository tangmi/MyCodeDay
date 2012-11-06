<?php

namespace StudentRND\CodeDay\Controllers\event;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class person extends Controllers\EventController
{
    public function before()
    {
        if (count($this->positional_args) < 1) {
            throw new \CuteControllers\HttpError(404);
        }

        try {
            $this->person = new Models\Registrant($this->positional_args[0]);
        } catch (\Exception $ex) {
            throw new \CuteControllers\HttpError(404);
        }

        CodeDay\Application::$twig->addGlobal('person', $this->person);


        $this->twig_form = 'people/edit_profile.html.twig';
        $this->form = new \FastForms\Form('\StudentRND\CodeDay\Models\Registrant');
        $this->form->static_values = array(
            'eventID' => $this->person->eventID,
            'password' => $this->person->password,
            'salt' => $this->person->salt,
            'first_name' => $this->person->first_name,
            'last_name' => $this->person->last_name,
            'checked_in' => $this->person->checked_in,
            'ticket_id' => $this->person->ticket_id
        );

        if (!Models\Registrant::is_logged_in() || !Models\Registrant::current()->is_organizer) {
            $this->form->static_values['person_type'] = $this->person->person_type;
        }
    }

    public function __get_index()
    {
        if (Models\Registrant::is_logged_in() &&
            (Models\Registrant::current() == $this->person || Models\Registrant::current()->is_organizer) &&
            !$this->request->get('preview')) {
            $instance = $this->person;
            include_once(TEMPLATE_DIR . '/form.php');
        } else {
            echo CodeDay\Application::$twig->render('people/profile.html.twig');
        }
    }

    public function __post_index()
    {
        if (Models\Registrant::current() != $this->person && !Models\Registrant::current()->is_organizer) {
            throw new \CuteControllers\HttpError(403);
        }

        $this->form->update($this->person);
        $this->redirect('/person/' . $this->person->registrantID);
    }

    public function __get_password()
    {
        if (Models\Registrant::current() != $this->person && !Models\Registrant::current()->is_organizer) {
            throw new \CuteControllers\HttpError(403);
        }

        echo CodeDay\Application::$twig->render('people/password.html.twig');
    }

    public function __post_password()
    {
        if (Models\Registrant::current() != $this->person && !Models\Registrant::current()->is_organizer) {
            throw new \CuteControllers\HttpError(403);
        }


        if ($this->request->post('password') === $this->request->post('password_confirm')) {
            $this->person->password = $this->request->post('password');
            $this->person->update();
            $this->redirect('/person/' . $this->person->registrantID);
        } else {
            echo CodeDay\Application::$twig->render('people/password.html.twig', array(
                                                        'error' => "Passwords didn't match"
                                                    ));
        }
    }
}
