<?php

namespace StudentRND\CodeDay\Models\Event;

use \StudentRND\CodeDay\Models;

/**
 * Represents a sponsor at an event
 */
class Sponsor extends Models\EventItem
{
    public static $table_name = 'events_sponsors';
    public static $primary_key = 'sponsorID';

    protected $sponsorID;
    protected $name;
    protected $url;
    protected $logo;
}
