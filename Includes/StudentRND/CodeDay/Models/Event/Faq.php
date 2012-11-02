<?php

namespace StudentRND\CodeDay\Models\Event;

use \StudentRND\CodeDay\Models;

/**
 * Represents an FAQ entry. (Standard entries are hard-coded, so this is only necessary to add additional ones.)
 */
class Faq extends Models\EventItem
{
    public static $table_name = 'events_faqs';
    public static $primary_key = 'faqID';

    protected $faqID;
    protected $title;
    protected $html;
}
