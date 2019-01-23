<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\ModelStatus;
use Illuminate\Support\Facades\Route;

Trait AddStatusTrait{


    //
    public static $except = [
        'api/v1/churches/register'

    ];

    public static function bootAddStatusTrait()
    {
        self::setStatus();
    }


     /**
     * Defines the statua field for the model.
     * @return string
     */
    protected static function statusField()
    {
        return 'status';
    }


    public static function setStatus()
    {
        static::creating(function ($model) {

            if( ! in_array(Route::getFacadeRoot()->current()->uri(), self::$except) ){

                $model->{self::statusField()} =  ( Auth::user()->isBranchAdmin() ) ? ModelStatus::PENDING_APPROVAL : ModelStatus::ACTIVE;
            }

        });
    }


}
