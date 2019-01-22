<?php

namespace App\Traits;

Trait OnlyActive{

    public  $useAdminApproval = true;

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
        return 'status';
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
