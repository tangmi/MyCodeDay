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
}
