<?php

namespace App\Modules\Notify\Traits;

Trait SmsTrait{


    /**
     * The recipiens to send the message to
     */
    public  $recipients = [];


    /**
     * List of failed clients
     */
    public $failed = [];

    /**
     * Recepients that should be excluded if they are in the list
     */
    public $exclude = [];


    /**
     * The message to be sent
     */
    public $message;


    /**
     * @type integer
     * if the  message was a reply to another.
     */
    public $replyTo;


    /**
     * @type boolean
     * if the message has been read
     */
    public $read;


    public function log()
    {
        //log the message
    }



    /**
     * For recipients that come as strings, convert to an array
     */
    public function recepientsToArray( String $recipients)
    {
        return explode(',', $recipients);
    }


    /**
     * Stringifies an array of recipients
     */
    public function recepientsToString( Array $recipients)
    {
        return implode(',', $recipients);
    }
}
