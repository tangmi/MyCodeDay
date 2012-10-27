<?php

class Mixpanel {
    public static $token;
    protected static $host = 'http://api.mixpanel.com/';

    public static function track($event, $properties=array()) {
        $params = array(
            'event' => $event,
            'properties' => $properties
            );

        if (!isset($params['properties']['token'])){
            $params['properties']['token'] = static::$token;
        }

        $url = self::$host . 'track/?data=' . base64_encode(json_encode($params));
        exec("curl '" . $url . "' >/dev/null 2>&1 &");
    }
}
