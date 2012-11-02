<?php

namespace StudentRND\CodeDay\Models\Event;

use \StudentRND\CodeDay\Models;

/**
 * Represents a workshop.
 */
class Workshop extends Models\EventItem
{
    public static $table_name = 'events_workshops';
    public static $primary_key = 'workshopID';

    protected $workshopID;
    protected $title;
    protected $link;
    protected $time;
    protected $presenter;
    protected $presenter_link;
}
