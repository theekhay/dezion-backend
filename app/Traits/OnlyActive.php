<?php

namespace App\Traits;

Trait OnlyActive{

    // public static ACTIVE = 1;
    // public const INACTIVE = 0;

    // public const LIVE = 111;

    public static function bootOnlyActive(){

        static::addGlobalScope(new OnlyActiveRecordScope);
    }



    /**
     * Get the fully qualified "active" column.
     *
     * @return string
     */
    public function getActiveColumn()
    {
        return 'active';
    }


    /**
     * Determines if a model instance is active or not
     * @return boolean
     */
    public function isActive()
    {
        return $this->{$this->getActiveColumn()} ;
    }
}
