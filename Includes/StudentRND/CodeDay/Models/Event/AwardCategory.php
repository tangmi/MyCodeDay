<?php

namespace StudentRND\CodeDay\Models\Event;

use \StudentRND\CodeDay\Models;

class AwardCategory extends Models\EventItem
{
    public static $table_name = 'awardcategories';
    public static $primary_key = 'awardcategoryID';

    protected $awardcategoryID;

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
