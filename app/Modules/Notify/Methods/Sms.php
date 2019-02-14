<?php

namespace App\Modules\Notify\Methods;

use App\Modules\Notify\Concerns\INotify;
use App\Modules\Notify\Traits\SmsTrait;


Class Sms{

    use SmsTrait;

    private $notifier;


    public function __construct(INotify $notifier)
    {
        $this->notifier = $notifier;
    }



    /**
     * Send an sms using the current default
     */
    public function send()
    {
        return $this->notifier->send($this->message, $this->recepients);

        // foreach( $this->recepient as $recepient)
        // {
        //     if ( ! \in_array( $recepient, $this->exclude) )
        //     {
        //         $this->notifier->send();
        //     }
        // }

    }
}
