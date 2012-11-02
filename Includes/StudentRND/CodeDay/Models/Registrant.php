<?php

namespace StudentRND\CodeDay\Models;

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
        if (isset($_SESSION['registrantID'])) {
            return new Registrant($_SESSION['registrantID']);
        } else {
            throw new \CuteControllers\HttpError(401);
        }
    }

    /**
     * Logs the registrant out.
     */
    public static function logout()
    {
        unset($_SESSION['registrantID']);
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

    /* Functions */
    /**
     * Checks if the supplied password is correct.
     * @param  string $password Password to check
     * @return boolean          TRUE if the password is correct or there is no password set, FALSE otherwise.
     */
    public function check_password($password)
    {
        if ($this->password) {
            $proper_hash = hash('whirlpool', $password . '$' . $this->salt);
            return $proper_hash === $this->password;
        } else {
            return TRUE;
        }
    }

    /**
     * Logs the registrant in.
     */
    public function login()
    {
        $_SESSION['registrantID'] = $this->registrantID;
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
        $this->salt = hash('whirlpool', time() . rand(0,1000000) . hash('whirlpool', $val));
        $this->password = hash('whirlpool', $val . '$' . $this->salt);
        $this->invalidate('salt');
        $this->invalidate('password');
    }

    // About Me
    protected $first_name;
    protected $last_name;
    protected $bio;
    protected $profile_image;
    protected $age;
    protected $gender;
    protected $school;
    protected $skills;

    public function __get_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Contact Info:
    protected $website;                         protected $__validate_website = 'url';
    protected $email;                           protected $__validate_email = 'email';

    // Operational
    protected $person_type;
    protected $checked_in;
    protected $internship_opt_in;

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
