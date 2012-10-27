<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models\Mappings;

class Team extends \TinyDb\Orm
{
    public static $table_name = 'teams';
    public static $primary_key = 'teamID';

    protected $teamID;

    // Stuff the team can set
    protected $name;
    protected $description;
    protected $website_link;
    protected $play_link;
    protected $download_link;

    // Stuff organizers will set
    protected $video_link;
    protected $presentation_link;
    protected $team_picture_url;


    protected $eventID;
    public function __get_event()
    {
        return new Event($this->eventID);
    }

    public function __get_teams()
    {
        return \TinyDb\Collection('\StudentRND\CodeDay\Models\Mappings\RegistrantTeam', \TinyDb\Sql::create()
                                  ->select('*')
                                  ->from(Mappings\RegistrantTeam::$table_name)
                                  ->where('teamID = ?', $this->teamID))->each(function($mapping){
                                    return $mapping->registrant;
                                  });
    }
}
