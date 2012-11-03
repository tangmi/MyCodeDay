<?php

namespace StudentRND\CodeDay\Models;

class VideoLike extends \TinyDb\Orm
{
    public static $table_name = 'videos_likes';
    public static $primary_key = array('registrantID', 'videoID');

    protected $registrantID;
    protected $videoID;


    public static function create(Registrant $registrant, Video $video)
    {
        return parent::create(array(
            'registrantID' => $registrant->registrantID,
            'videoID' => $video->videoID
        ));
    }

    public function __get_user()
    {
        return new Registrant($this->registrantID);
    }

    public function __get_video()
    {
        return new Video($this->videoID);
    }
}
