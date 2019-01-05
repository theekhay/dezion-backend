<?php

namespace App\Modules\Notify\Methods;

//concerns
use App\Modules\Notify\Concerns\INotify;

//traits
use App\Modules\Notify\Traits\SmsTrait;

//models
use App\Modules\Notify\Models\InApp as InAppModel;
use Illuminate\Support\Facades\Auth;


Class InApp{

    use SmsTrait;


    /**
     * Send an sms using the current default
     */
    public function send()
    {
        $bulk = [];

        $time = date('Y-m-d H:i:s');

        //$recipients = $this->recepientsToArray( $this->recipients);

        foreach( $this->recipients as $recipient)
        {
            if ( ! in_array( $recipient, $this->exclude) )
            {
                $details = [
                    'recipient' => $recipient,
                    'sender' => Auth::id(),
                    'message' => $this->message,
                    'reply_to' => $this->replyTo,
                    'created_at' => $time,
                    'updated_at' => $time
                ];

                $bulk[] = $details;
            }
        }

        $message = InAppModel::insert($bulk);

        if( ! $message )
        {
            throw new \Exception("error sending message");
        }

        return true;



    }
}
