<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models\Mappings;

class Registrant extends \TinyDb\Orm
{
    public static $table_name = 'registrants';
    public static $primary_key = 'registrantID';

    protected $registrantID;
    protected $eventID;

    public function __get_event()
    {
        return new Event($this->eventID);
    }

    protected $first_name;
    protected $last_name;
    public function __get_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    protected $profile_image;

    protected $password;
    protected $website;
    protected $__validate_website = 'url';
    protected $salt;
    protected $email;
    protected $__validate_email = 'email';
    protected $bio;
    protected $linked_mystudentrnd_account;

    public function check_password($password)
    {
        if ($this->password) {
            $proper_hash = hash('whirlpool', $password . '$' . $this->salt);
            return $proper_hash === $this->password;
        } else {
            return TRUE;
        }
    }

    public function __set_password($val)
    {
        $this->salt = hash('whirlpool', time() . rand(0,1000000) . hash('whirlpool', $val));
        $this->password = hash('whirlpool', $val . '$' . $this->salt);
        $this->invalidate('salt');
        $this->invalidate('password');
    }

    public static function is_logged_in()
    {
        try {
            static::current();
            return true;
        } catch (\CuteControllers\HttpError $er) {
            return false;
        }
    }

    public static function current()
    {
        if (isset($_SESSION['registrantID'])) {
            return new Registrant($_SESSION['registrantID']);
        } else {
            throw new \CuteControllers\HttpError(401);
        }
    }

    public static function login(Registrant $current)
    {
        $_SESSION['registrantID'] = $current->registrantID;
    }

    public static function logout()
    {
        unset($_SESSION['registrantID']);
    }

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

    // Demographics
    protected $age;
    protected $gender;
    protected $school;

    // Operational
    protected $checked_in;
    protected $internship_opt_in;

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

    public function on_team(Team $team)
    {
        return in_array($team, $this->teams);
    }
}
