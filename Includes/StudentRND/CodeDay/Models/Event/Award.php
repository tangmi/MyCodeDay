<?php

namespace StudentRND\CodeDay\Models\Event;

use \StudentRND\CodeDay\Models;

class Award extends Models\EventItem
{
    public static $table_name = 'events_awardcategories_awards';
    public static $primary_key = 'awardID';

    protected $awardID;

    protected $awardcategoryID;
    public function __get_awardcategory()
    {
        return new AwardCategory($this->awardcategoryID);
    }

    protected $rank;
    protected $teamID;
    public function __get_team()
    {
        return new Team($this->teamID);
    }
}
