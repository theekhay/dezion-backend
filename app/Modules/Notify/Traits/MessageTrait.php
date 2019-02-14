<?php

namespace App\Modules\Notify\Traits;
use App\Modules\Notify\Methods\InApp as InAppMsg;
use App\Modules\Notify\Models\InApp;

Trait MessageTrait{

    public function sendInApp($message)
    {
        $inapp = new InAppMsg();
        $inapp->message = $message;
        $inapp->recipient = $this->id;

        try{
            $resp = $inapp->sendInApp();
        }
        catch( \Exception $e){
            return ['success'=> false, 'message' => $e->getMessage()];
        }

        return ['success' => true];
    }


    public function unread(){
        $unread_messages = InApp::where(['recipient' => $this->id, 'read' => false]);
        return $unread_messages;
    }

}
