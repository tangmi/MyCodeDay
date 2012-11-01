<?php

namespace StudentRND\CodeDay\Models;

class Event extends \TinyDb\Orm
{
    public static $table_name = 'events';
    public static $primary_key = 'eventID';

    protected $eventID;
    protected $name;
    protected $tagline;

    protected $start_time;
    protected $end_time;

    protected $location_name;
    protected $location_address_1;
    protected $location_address_2;
    protected $location_city;
    protected $location_state;
    protected $location_zip;
    protected $location_country;

    protected $hero_background_color;
    protected $hero_background_url;
    protected $hero_foreground_color;

    protected $eventbrite_id;

    public static function get_default_event()
    {
        $events = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                     ->select('*')
                                     ->from(static::$table_name)
                                     ->where('end_time >= DATE_ADD(NOW(), INTERVAL 72 HOUR)')
                                     ->order_by('start_time')
                                     ->limit(1));

        if (count($events) > 0) {
            return $events[0];
        } else {
            throw new \Exception("No upcoming CodeDays.");
        }
    }

    public static function get_all_events()
    {
        return new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                     ->select('*')
                                     ->from(static::$table_name)
                                     ->order_by('start_time'));
    }
}
