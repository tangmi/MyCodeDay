<?php

namespace StudentRND\CodeDay;

class Twilio
{
    public static $client;
    public static $number;
}

Twilio::$number = Application::$config['twilio']['number'];
Twilio::$client = new \Services_Twilio(Application::$config['twilio']['sid'], Application::$config['twilio']['token'], '2010-04-01');
