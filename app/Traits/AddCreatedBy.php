<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Trait AddCreatedBy
{

    /**
     * Issues with this trait during seeding
     * Keep getting the error "Integrity constraint violation: 1048 Column 'created_by' cannot be null"
     * even though attribute was present
     */
    private static $enabled = true;



    /**
     * List of routes to ignore when adding setting the created_by field
     * Typically these are routes that do not require authentication
     * This should be implemented in another way
     * find a way to check if a route implements the auth guard.
     *
     */
    private static $ignoreRoute = [

        'api/v1/admin/branch/create',
        'api/v1/churches/register'
    ];


    /**
     * Generate UUID v4 when creating model.
     */
    public static function boot()
    {
        parent::boot();

        /**
         * @prop $enaabled should be true for this to work
         * but false during seeding.
         * work find a better fix later
         */
       if( self::$enabled )
            self::created_by();
    }

     /**
     * Defines the UUID field for the model.
     * @return string
     */
    protected static function createdByField()
    {
        return 'created_by';
    }



    /**
     * Use if boot() is overridden in the model.
     */
    protected static function created_by()
    {
        static::creating(function ($model) {

            $model->{self::createdByField()} = ( ! in_array(Route::getFacadeRoot()->current()->uri(), self::$ignoreRoute) ) ?  Auth::id() : 1;

        });
    }

}
