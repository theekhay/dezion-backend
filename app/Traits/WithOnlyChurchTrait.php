<?php

namespace App\Traits;

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
