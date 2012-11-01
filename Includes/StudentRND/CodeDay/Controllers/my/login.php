<?php

namespace StudentRND\CodeDay\Controllers\my;

use \StudentRND\CodeDay\Models;

class login extends \CuteControllers\Base\Rest
{
    public function before()
    {
        if ($this->request->request('event_id')) {
            $this->event = new Models\Event($this->request->request('event_id'));
        } else {
            $this->event = Models\Event::get_default_event();
        }
    }

    public function __get_index()
    {
        include(TEMPLATE_DIR . '/my/login.php');
    }

    public function __post_index()
    {
        $first_name = $this->request->post('first_name');
        $last_name = $this->request->post('last_name');
        $password = $this->request->post('password');

        $user = Models\Registrant::find_by_name($this->event, $first_name, $last_name);

        $success = FALSE;

        if ($user) {
            $success = $user->check_password($password);
        }

        if ($success) {
            Models\Registrant::login($user);
            $this->redirect('/');
        } else {
            $login_error = TRUE;
            include(TEMPLATE_DIR . '/my/login.php');
        }
    }

    public function __post_usercheck()
    {
        $user = Models\Registrant::find_by_name(
                                                $this->event,
                                                $this->request->post('first_name'),
                                                $this->request->post('last_name'));

        if ($user !== NULL) {
            return array(
                         'exists' => TRUE,
                         'password' => ($user->password != FALSE));
        } else {
            return array('exists' => FALSE);
        }
    }
}
