<?php

namespace App\Modules\Notify\Traits;

Trait Message{

    // use InA


    public function sendInApp( Request $request)
    {
        $inapp = new InAppMsg();
        $inapp->message = $request->message;
        $inapp->recipient = $this->id;

        try{
            $resp = $inapp->send();
        }
        catch(Exception $e){
            $this->sendResponse($resp, "problem sending message");
        }
        $this->sendResponse($resp, "check");
    }

}
