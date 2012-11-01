<?php

namespace StudentRND\CodeDay\Controllers\user;

use \StudentRND\CodeDay\Models;

class index extends \CuteControllers\Base\Rest
{
    public function __post_update()
    {
        $email = $this->request->post('email');
        $website = $this->request->post('website');
        $bio = $this->request->post('bio');

        $reg = Models\Registrant::current();
        $reg->website = $website;
        $reg->email = $email;
        $reg->bio = $bio;

        $reg->update();
        $this->redirect('/');
    }
}
