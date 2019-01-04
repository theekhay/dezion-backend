<?php

namespace App\Modules\Notify\Concerns;

Interface INotify{

    public function send(String $message, String $recepient);


    public function log();


}
