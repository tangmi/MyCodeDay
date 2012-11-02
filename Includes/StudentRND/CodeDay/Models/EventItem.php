<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models;

class EventItem extends \TinyDb\Orm
{
    protected $eventID;
    public function __get_event()
    {
        return new Models\Event($this->eventID);
    }
}
