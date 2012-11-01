<?php

namespace StudentRND\CodeDay\Controllers\user;

use \StudentRND\CodeDay\Models;

class password extends \CuteControllers\Base\Rest
{
    public function __get_index()
    {
        include(TEMPLATE_DIR . '/my/user/password.php');
    }

    public function __post_index()
    {
        $password = $this->request->post('password');
        $password_confirm = $this->request->post('password_confirm');

        if ($password === $password_confirm) {
            $reg = Models\Registrant::current();
            $reg->password = $password;

            $reg->update();
            $this->redirect('/');
        } else {
            $error = "Passwords did not match";
        include(TEMPLATE_DIR . '/my/user/password.php');
        }
    }
}
