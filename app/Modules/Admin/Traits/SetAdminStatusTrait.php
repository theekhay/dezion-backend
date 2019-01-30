<?php

namespace App\Modules\Admin\Traits;

use App\Modules\Admin\Models\AdminStatus;
use App\Modules\Admin\Models\SuperAdmin;

Trait SetAdminStatusTrait{


    public static function bootSetAdminStatusTrait()
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

            $model->{self::statusField()} =  AdminStatus::PENDING_EMAIL_CONFIRMATION ;

        });
    }
}
