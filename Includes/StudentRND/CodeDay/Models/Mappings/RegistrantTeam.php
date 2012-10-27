<?php

namespace StudentRND\CodeDay\Models\Mappings;

use \StudentRND\CodeDay\Models;

class RegistrantTeam extends \TinyDb\Orm
{
    public static $table_name = 'registrants_teams';
    public static $primary_key = array('registrantID', 'teamID');

    protected $registrantID;
    public function __get_registrant()
    {
        return new Models\Registrant($this->registrantID);
    }

    protected $teamID;
    public function __get_team()
    {
        return new Models\Team($this->teamID);
    }
}
