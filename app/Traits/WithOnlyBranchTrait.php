<?php

namespace App\Traits;

Trait WithOnlyBranchTrait{



    public static function bootWithOnlyBranchTrait(){

        static::addGlobalScope( new WithOnlyBranchScope );
    }


     /**
     * Defines the branch id  field for the model.
     * @return string
     */
    public static function getBranchIdField()
    {
        return 'branch_id';
    }
}
