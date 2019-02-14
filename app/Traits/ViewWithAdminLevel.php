<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

Trait ViewWithAdminLevel
{

    /**
     * Issues with this trait during seeding
     * Keep getting the error "Integrity constraint violation: 1048 Column 'created_by' cannot be null"
     * even though attribute was present
     */
    private static $enabled = true;


    /**
     * Generate UUID v4 when creating model.
     */
    protected static function boot()
    {
        parent::boot();

    }

     /**
     * Defines the UUID field for the model.
     * @return string
     */
    protected static function createdByField()
    {
       // return 'created_by';
    }



    /**
     * Use if boot() is overridden in the model.
     */
    protected static function created_by()
    {
        static::creating(function ($model) {
            $model->{self::createdByField()} =  empty( Auth::id() ) ? 1 : Auth::id();
        });
    }

}
