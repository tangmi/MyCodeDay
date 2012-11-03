<?php

namespace StudentRND\CodeDay\Models;

class Phone extends \TinyDb\Orm
{
    public static $table_name = 'registrants_phones';
    public static $primary_key = 'phoneID';

    protected $phoneID;
    protected $registrantID;
    protected $push_token;
    protected $created_at;

    public static function create($phoneID, $push_token)
    {
        return parent::create(array(
            'phoneID' => $phoneID,
            'push_token' => $push_token,
            'registrantID' => NULL
        ));
    }

    public function __get_registrant()
    {
        return new Registrant($this->registrantID);
    }

    public function send_push($message, $additional_data = array()) {
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', WEB_DIR . '/dev.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', 'banana');

        // Open a connection to the APNS server
        $fp = stream_socket_client(
                'ssl://gateway.push.apple.com:2195', $err,
                $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);
        // Create the payload body
        $body['aps'] = array(
                'alert' => $message,
                'sound' => 'default',
                );

        foreach ($additional_data as $k=>$v) {
            $body['aps'][$k] = $v;
        }

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $this->push_token) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        // Close the connection to the server
        fclose($fp);


    }
}
