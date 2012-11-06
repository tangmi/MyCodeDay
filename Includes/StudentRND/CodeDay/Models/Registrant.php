<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay;
use \StudentRND\CodeDay\Models\Mappings;

class Registrant extends EventItem
{
    public static $table_name = 'registrants';
    public static $primary_key = 'registrantID';
    /* Static Functions */
    /**
     * Checks if the user is logged in.
     * @return boolean TRUE if the user is logged in, FALSE otherwise.
     */
    public static function is_logged_in()
    {
        try {
            static::current();
            return TRUE;
        } catch (\CuteControllers\HttpError $er) {
            return FALSE;
        }
    }

    /**
     * Gets the current logged in user, or throws a 401 error if there is none.
     * @return Registrant Current logged in user.
     */
    public static function current()
    {
        if (isset($_SESSION['registrantID_' . CodeDay\Application::$event->eventID])) {
            try {
                return new Registrant($_SESSION['registrantID_' . CodeDay\Application::$event->eventID]);
            } catch (\Exception $ex) {
                static::logout();
            }
        } else {
            throw new \CuteControllers\HttpError(401);
        }
    }

    /**
     * Logs the registrant out.
     */
    public static function logout()
    {
        unset($_SESSION['registrantID_' . CodeDay\Application::$event->eventID]);
    }

    /**
     * Finds a person by first and last name. Case insensitive.
     * @param  Event  $event      The event to search
     * @param  string $first_name First name of the participant.
     * @param  string $last_name  Last name of the participant.
     * @return boolean            Registrant object representing the participant, or NULL if not found.
     */
    public static function find_by_name(Event $event, $first_name, $last_name)
    {
        $user = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Registrant', \TinyDb\Sql::create()
                          ->select('*')
                          ->from(Registrant::$table_name)
                          ->where('LOWER(first_name) = LOWER(?)', $first_name)
                          ->where('LOWER(last_name) = LOWER(?)', $last_name)
                          ->where('eventID = ?', $event->eventID)
                          ->limit(1));
        if (count($user) > 0) {
            return $user[0];
        } else {
            return NULL;
        }
    }

    public static function find_by_ticket_id(Event $event, $ticket_id)
    {
        $user = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Registrant', \TinyDb\Sql::create()
                          ->select('*')
                          ->from(Registrant::$table_name)
                          ->where('ticket_id = ?', $ticket_id)
                          ->where('eventID = ?', $event->eventID)
                          ->limit(1));
        if (count($user) > 0) {
            return $user[0];
        } else {
            return NULL;
        }
    }


    public static function create(Event $event, $first_name, $last_name, $ticket_id)
    {
        return parent::create(array(
            'eventID' => $event->eventID,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'ticket_id' => $ticket_id
        ));
    }

    /* Functions */
    /**
     * Checks if the supplied password is correct.
     * @param  string $password Password to check
     * @return boolean          TRUE if the password is correct or there is no password set, FALSE otherwise.
     */
    public function check_password($password)
    {
        if (!CodeDay\Application::$event->has_started && !$this->is_organizer) {
            return FALSE;
        }/* else if (CodeDay\Application::$event->has_ended && !$this->password) {
            return FALSE;
        } Don't allow empty passwords after the event */

        if ($this->password) {
            $proper_hash = hash('whirlpool', $password . '$' . $this->salt);
            return $proper_hash === $this->password;
        } else {
            return TRUE;
        }
    }

    public function __get_is_organizer()
    {
        return $this->person_type == 'organizer' || $this->person_type == 'facilitator';
    }

    /**
     * Logs the registrant in.
     */
    public function login()
    {
        $_SESSION['registrantID_' . CodeDay\Application::$event->eventID] = $this->registrantID;
    }

    /**
     * Checks if the person is on a team.
     * @param  Team   $team Team to check
     * @return boolean      TRUE if the person is on the team, FALSE otherwise.
     */
    public function on_team(Team $team)
    {
        return in_array($team, $this->teams);
    }

    /* Properties */
    protected $registrantID;

    // Login Info:
    protected $password;
    protected $salt;
    public function __set_password($val)
    {
        if (!$val) {
            $this->password = NULL;
            $this->salt = NULL;
        } else {
            $this->salt = hash('whirlpool', time() . rand(0,1000000) . hash('whirlpool', $val));
            $this->password = hash('whirlpool', $val . '$' . $this->salt);
        }
        $this->invalidate('salt');
        $this->invalidate('password');
    }

    // About Me
    protected $first_name;
    protected $last_name;
    protected $work;                          public static $__name_work = 'Professional Headline (Title/Job/etc)';
    protected $bio;
    protected $profile_image;                 public static $__name_profile_image = 'Picture (click to change)';
    protected $skills;                        public static $__name_skills = "Comma-separated list of skills";

    public function __get_skills_list()
    {
        $orig_list = explode(',', $this->skills);
        $ret = array();
        foreach ($orig_list as $item) {
            $ret[] = trim($item);
        }

        return $ret;
    }

    public function __get_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Contact Info:
    protected $website;                       protected $__optional_website = TRUE;
    public function __set_website($val)
    {
        if ($val != "" && substr($val, 0, 4) !== 'http') {
            $val = 'http://' . $val;
        }

        $this->website = $val;
        $this->invalidate('website');
    }
    protected $email;                         protected $__validate_email = 'email'; protected $__optional_email = TRUE;
    protected $phone;                         public static $__name_phone = "Phone number, if you want to recieve event info texts";

    public function send_text($message)
    {
        if ($this->phone) {
            try {
                CodeDay\Twilio::$client->account->sms_messages->create(
                    CodeDay\Twilio::$number,
                    $this->plain_phone,
                    $message
                );
            } catch (\Exception $ex) {}
        }
    }

    public function __validate_phone($num)
    {
        $cleaned_phone = preg_replace('/[^0-9]*/','', $num);
        if ($cleaned_phone == '0') {
            return TRUE;
        }
        return in_array(strlen($cleaned_phone), array(0,10,11,12,13));
    }

    public function __set_phone($val)
    {
        if ($val === '0') {
            $this->phone = NULL;
        } else {
            $this->phone = $val;
        }

        $this->invalidate('phone');
    }

    public function __get_plain_phone()
    {
        $cleaned_phone = preg_replace('/[^0-9]*/','', $this->phone);

        if (strlen($cleaned_phone) == 10) {
            $cleaned_phone = "1" . $cleaned_phone;
        }

        return $cleaned_phone;
    }

    // Operational
    protected $person_type;
    protected $checked_in;
    protected $internship_opt_in;               public static $__name_internship_opt_in = 'Interested in information about internships?';

    /**
     * Gets a list of teams the user is on
     * @return array(Team) List of teams. NOT a \TinyDb\Collection, unlike most things.
     */
    public function __get_teams()
    {
        $collection = new \TinyDb\Collection('\StudentRND\CodeDay\Models\Mappings\RegistrantTeam', \TinyDb\Sql::create()
                                  ->select('*')
                                  ->from(Mappings\RegistrantTeam::$table_name)
                                  ->where('registrantID = ?', $this->registrantID));

        return $collection->each(function($mapping){
            return $mapping->team;
        });
    }
}
