<?php

namespace App\Traits;

/**
 * This Trait is used to filter the data retreived from the database
 * it would return data based on the admin type of the logged in user
 * If the admin is a church or Branch level admin, it returns only data for the church they belong to
 * if the admin is a super admin, then the data for all churches is returned.
 *
 * Any model that applies this trait would have its data filtered for all read-type queries
 *
 */
Trait WithOnlyChurchTrait{



    public static function bootWithOnlyChurchTrait(){

        static::addGlobalScope( new WithOnlyChurchScope );
    }


     /**
     * Defines the church field for the model.
     * @return string
     */
    public static function getChurchIdField()
    {
        return 'church_id';
    }
}
