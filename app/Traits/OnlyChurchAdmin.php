<?php

namespace App\Traits;

Trait OnlyChurchAdmin{

    public static function bootOnlyChurchAdmin(){

        static::addGlobalScope(new OnlyChurchAdminScope );
    }



    /**
     * Get the fully qualified "type" column.
     *
     * @return string
     */
    public static function getAdminTypeColumn()
    {
        return 'type';
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
