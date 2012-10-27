<?php

namespace StudentRND\CodeDay\Models;

use \StudentRND\CodeDay\Models\Mappings;

class Registrant extends \TinyDb\Orm
{
    public static $table_name = 'registrants';
    public static $primary_key = 'registrantID';

    protected $registrantID;
    protected $eventID;

    protected $first_name;
    protected $last_name;
    protected $password;
    protected $email;
    protected $bio;
    protected $linked_mystudentrnd_account;

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

    // Demographics
    protected $age;
    protected $gender;
    protected $school;

    // Operational
    protected $checked_in;
    protected $internship_opt_in;

    public function __get_teams()
    {
        return \TinyDb\Collection('\StudentRND\CodeDay\Models\Mappings\RegistrantTeam', \TinyDb\Sql::create()
                                  ->select('*')
                                  ->from(Mappings\RegistrantTeam::$table_name)
                                  ->where('registrantID = ?', $this->registrantID))->each(function($mapping){
                                    return $mapping->team;
                                  });
    }
}
