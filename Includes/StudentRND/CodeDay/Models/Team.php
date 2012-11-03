<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models\Mappings;

class Team extends \TinyDb\Orm
{
    public static $table_name = 'teams';
    public static $primary_key = 'teamID';

    /* Static functions */
    public static function create(Event $event, $name)
    {
        if (static::team_name_used($event, $name)) {
            throw new \Exception("Team exists.");
        }

        return parent::create(array(
            'name' => $name,
            'eventID' => $event->eventID
        ));
    }

    public static function team_name_used(Event $event, $name)
    {
        return $event->teams->contains(function($team) use ($name) {
            return $team->name === $name;
        });
    }

    /* Functions */
     public function join(Registrant $registrant)
    {
        Mappings\RegistrantTeam::create($registrant, $this);
    }

    public function leave(Registrant $registrant)
    {
        try {
            $registrant_mapping = new Mappings\RegistrantTeam(array(
                'registrantID' => $registrant->registrantID,
                'teamID' => $this->teamID
            ));

            $registrant_mapping->delete();
        } catch (\TinyDb\NoRecordException $ex) {
            throw new \Exception("That person wasn't on this team");
        }


    }

    public function __get_registrants()
    {
        $registrants = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Mappings\RegistrantTeam', \TinyDb\Sql::create()
                                  ->select('*')
                                  ->from(Mappings\RegistrantTeam::$table_name)
                                  ->where('teamID = ?', $this->teamID));

        return $registrants->each(function($mapping){
                return $mapping->registrant;
              });
    }

    /* Properties */
    protected $teamID;

    // Stuff the team can set
    protected $name;
    public function __validate_name($val)
    {
        $me = $this;
        return !static::get_all_teams($this->event)->contains(function($team) use ($val, $me) {
            return ($team->teamID !== $me->teamID &&
                    $team->name === $val);
        });
    }
    protected $description;
    protected $website_link;
    public $__optional_website_link = TRUE;
    public $__validate_website_link = 'url';
    protected $try_link;
    public $__optional_try_link = TRUE;
    public $__validate_try_link = 'url';

    // Stuff organizers will set
    protected $video_link;
    protected $presentation_link;
    protected $team_picture_url;


    protected $eventID;
    public function __get_event()
    {
        return new Event($this->eventID);
    }
}
