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

    protected $hero_background_url;
    protected $color;

    protected $eventbrite_id;

    public function __get_location_map_link()
    {
        return "https://maps.google.com/maps?q=" . urlencode($this->location_name . ', ' .
                                                             $this->location_address_1 .
                                                             ($this->location_address_2? ', ' . $this->location_address_2 : '') .
                                                             $this->location_city . ' ' .
                                                             $this->location_state . ', ' .
                                                             $this->location_zip . ', ' .
                                                             $this->location_country);
    }

    public function __get_time_period_string()
    {
        // Check if it's noon - noon (standard CodeDay format)
        $noon_noon = (date('ga', $this->start_time) == '12pm' && date('ga', $this->end_time) == '12pm');

        // Check if this is in a different year:
        $past_year = (date('Y') !== date('Y', $this->start_time));

        $start_year_specify_string = ($past_year ? date(', Y', $this->start_time) : '');
        $end_year_specify_string = ($past_year ? date(', Y', $this->end_time) : '');

        if ($noon_noon) {
            return date('l F j', $this->start_time) . $start_year_specify_string . ', Noon - Noon';
        } else {
            return date('l F j', $this->start_time) . $start_year_specify_string . ' at ' .
                            date('ga', $this->start_time) .' to ' .
                   date('l F j', $this->end_time) . $end_year_specify_string . ' at ' .
                            date('ga', $this->end_time);
        }
    }

    public function __get_color_rgb()
    {
        $color = $this->color;
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        if (strlen($color) == 6) {
            list($r, $g, $b) = array($color[0].$color[1],
            $color[2].$color[3],
            $color[4].$color[5]);
        } else if (strlen($color) == 3) {
            list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
        } else {
            return false;
        }

        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);

        return (object)array('r' => $r, 'g' => $g, 'b' => $b);
    }

    public function __get_accent_color()
    {
        $rgb = $this->color_rgb;

        $r = max($rgb->r - 60, 0);
        $g = max($rgb->g - 52, 0);
        $b = max($rgb->b - 25, 0);

        return str_pad(dechex($r), 2, '0') . str_pad(dechex($g), 2, '0') . str_pad(dechex($b), 2, '0');
    }

    public function __get_accent_color_light()
    {
        $rgb = $this->color_rgb;

        $xx = 0.07;

        $r = min(($rgb->r * $xx) + (255 * (1 - $xx)), 255);
        $g = min(($rgb->g * $xx) + (255 * (1 - $xx)), 255);
        $b = min(($rgb->b * $xx) + (255 * (1 - $xx)), 255);

        return str_pad(dechex($r), 2, '0') . str_pad(dechex($g), 2, '0') . str_pad(dechex($b), 2, '0');
    }

    public function __get_has_started()
    {
        return $this->start_time <= time();
    }

    public function __get_has_ended()
    {
        return $this->end_time <= time();
    }

    public function __get_registrants()
    {
        $registrants = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Registrant', \TinyDb\Sql::create()
                                              ->select('*')
                                              ->from(Registrant::$table_name)
                                              ->where('eventID = ?', $this->eventID));
        return $registrants;
    }

    public function get_registrants_by_type($type)
    {
        return $this->registrants->find(function($registrant) use($type){
            return $registrant->person_type == $type;
        });
    }

    public function __get_organizers()
    {
        return $this->get_registrants_by_type('organizer');
    }

    public function __get_judges()
    {
        return $this->get_registrants_by_type('judge');
    }

    public function __get_participants()
    {
        return $this->get_registrants_by_type('participant');
    }

    public function __get_mentors()
    {
        return $this->get_registrants_by_type('mentors');
    }

    public function __get_facilitators()
    {
        return $this->get_registrants_by_type('facilitator');
    }

    public function __get_teams()
    {
        $teams = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Team', \TinyDb\Sql::create()
                                        ->select('*')
                                        ->from(Team::$table_name)
                                        ->where('eventID = ?', $this->eventID));
    }

    /**
     * Gets the default event for the installation. On the web this will be the next event. On a local install, this
     * will be the event specified in local.ini. Throws an exception if there are no upcoming CodeDays.
     * @return Event The default event.
     */
    public static function get_default_event()
    {
        $events = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                     ->select('*')
                                     ->from(static::$table_name)
                                     ->where('end_time >= DATE_SUB(NOW(), INTERVAL 72 HOUR)')
                                     ->order_by('start_time')
                                     ->limit(1));

        if (count($events) > 0) {
            return $events[0];
        } else {
            throw new \Exception("No upcoming CodeDays.");
        }
    }

    /**
     * Gets a Collection of all events
     * @return \TinyDb\Collection Collection of all events, ordered by start time.
     */
    public static function get_all_events()
    {
        return new \TinyDb\Collection('\StudentRND\CodeDay\Models\Event', \TinyDb\Sql::create()
                                     ->select('*')
                                     ->from(static::$table_name)
                                     ->order_by('start_time'));
    }
}
