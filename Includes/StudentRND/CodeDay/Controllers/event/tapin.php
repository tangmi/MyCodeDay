<?php

namespace StudentRND\CodeDay\Controllers\event;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models;
use \StudentRND\CodeDay\Models\Event;
use \StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Controllers;

class phone extends Controllers\EventController
{
    public function __get_enroll()
    {
        $phoneID = $this->request->get('phone_id');
        $push = $this->request->get('push');

        try {
            $phone = new Models\Phone($phoneID);
            $phone->push_token = $push;
            $phone->update();
        } catch (\Exception $ex) {
            Models\Phone::create($phoneID, $push);
        }
    }

    public function __get_associate()
    {
        $phoneID = $this->request->get('phone_id');
        $first_name = $this->request->get('first_name');
        $last_name = $this->request->get('last_name');

        $phone = new Models\Phone($phoneID);
        $user = Models\Registrant::find_by_name($this->event,
                                                $this->request->post('first_name'),
                                                $this->request->post('last_name'));

        $phone->userID = $user->userID;
        $phone->update();
    }

    public function __get_upload()
    {
        $phoneID = $this->request->get('phone_id');
        $phone = new Models\Phone($phoneID);
        $file = $this->request->get('file');
        $video = Models\Video::create($phone, $file);

        try {
            $user = $phone->user; // This may fail, so do it early to save work.
            $all_users = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Registrant', \TinyDb\Sql::create()
                                                ->select('*')
                                                ->from(Models\Registrant::$table_name)
                                                ->where('is_admin == 1'));

            foreach ($all_users as $to_notify_user) {
                try {
                    foreach ($to_notify_user->phones as $to_notify_phone) {
                        $to_notify_phone->send_push('New video from ' . $user->name, array('video' => $video->videoID));
                    }
                } catch (\Exception $ex) { }
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

    }
}
