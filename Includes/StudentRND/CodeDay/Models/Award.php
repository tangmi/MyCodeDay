<?php

namespace StudentRND\CodeDay\Models;

class Award extends \TinyDb\Orm
{
    public static $table_name = 'awards';
    public static $primary_key = 'awardID';

    protected $awardID;
    protected $eventID;
    public function __get_event()
    {
        return new Event($this->eventID);
    }

    protected $rank;

    protected $awardcategoryID;
    public function __get_awardcategory()
    {
        return new AwardCategory($this->awardcategoryID);
    }

    protected $teamID;
    public function __get_team()
    {
        return new Team($this->teamID);
    }
}
