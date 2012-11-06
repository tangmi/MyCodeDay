<?php

namespace StudentRND\CodeDay\Controllers\event;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class login extends Controllers\EventController
{
    public function __get_index()
    {
        echo CodeDay\Application::$twig->render('login.html.twig');
    }

    public function __post_index()
    {
        try {
            $user = Models\Registrant::find_by_name($this->event,
                                                    $this->request->post('first_name'),
                                                    $this->request->post('last_name'));

            if ($user && $user->check_password($this->request->post('password'))) {
                $was_error = FALSE;
            } else {
                $was_error = TRUE;
            }
        } catch (\Exception $ex) {
            $was_error = TRUE;
        }

        if ($was_error) {
            echo CodeDay\Application::$twig->render('login.html.twig', array( 'error' => "That login wasn't found" ));
        } else {
            $user->login();
            if ($user->password) {
                $this->redirect('/person/' . $user->registrantID);
            } else {
                $this->redirect('/person/password/' . $user->registrantID);
            }
        }
    }

    public function __get_logout()
    {
        Models\Registrant::logout();
        $this->redirect('/');
    }
}
