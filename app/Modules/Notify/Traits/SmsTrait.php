<?php

namespace App\Modules\Notify\Traits;

Trait SmsTrait{


    /**
     * The recipiens to send the message to
     */
    public  $recepients = [];


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


    public function log()
    {
        //log the message
    }
}
