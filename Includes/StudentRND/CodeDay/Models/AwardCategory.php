<?php

namespace StudentRND\CodeDay\Models;

class AwardCategory extends \TinyDb\Orm
{
    public static $table_name = 'awardcategories';
    public static $primary_key = 'awardcategoryID';

    protected $awardcategoryID;

    protected $eventID;
    public function __get_event()
    {
        return new Event($this->event);
    }

    public function __get_awards()
    {
        return \TinyDb\Collection('\StudentRND\CodeDay\Models\Award', \TinyDb\Sql::create()
                          ->select('*')
                          ->from(Award::$table_name)
                          ->where('awardcategoryID = ?', $this->awardcategoryID));
    }

    protected $is_ranked;
    protected $name;
    protected $sort;
}
