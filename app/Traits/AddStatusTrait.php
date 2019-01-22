<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\ModelStatus;

Trait AddStatusTrait{

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

            $model->{self::statusField()} =  ( Auth::user()->isBranchAdmin() ) ? ModelStatus::PENDING_APPROVAL : ModelStatus::ACTIVE;
        });
    }


}
