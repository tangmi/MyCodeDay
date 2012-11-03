<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models\Mappings;

class Video extends EventItem
{
    public static $table_name = 'videos';
    public static $primary_key = 'videoID';

    protected $videoID;
    protected $phoneID;
    protected $title;
    protected $file;
    protected $created_at;

    public static function create(Phone $phone, $file)
    {
        return parent::create(array(
            'phoneID' => $phone->phoneID,
            'file' => $file
        ));
    }

    public static function getFeed()
    {
        return new \TinyDb\Collection('\StudentRND\CodeDay\Models\Video', \TinyDb\Sql::create()
                                      ->select('*')
                                      ->from(Video::$table_name)
                                      ->where('eventID = ?', $this->eventID)
                                      ->order_by('created_at DESC'));
    }

    public function __get_likes()
    {
        return new \TinyDb\Collection('\StudentRND\CodeDay\Models\VideoLike', \TinyDb\Sql::create()
                                      ->select('*')
                                      ->from(VideoLike::$table_name)
                                      ->where('videoID = ?', $this->videoID)
                                      ->order_by('created_at DESC'));
    }

    public function __get_thumbnail()
    {
        $file_parts = explode('/', $this->file);
        $file_name = array_pop($file_parts);
        list($name, $ext) = explode('.', $file_name);

        return 'http://thumbs.duck.tapin.tv/' . $name . '/200x150/latest.jpg';
    }

    public function __get_phone()
    {
        return new Phone($this->phoneID);
    }

    public function __get_user()
    {
        return $this->phone->user;
    }
}
