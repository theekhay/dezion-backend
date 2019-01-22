<?php

namespace App\Traits;


Trait OnCreateTrait
{
    use UuidTrait, AddCreatedBy;


    public static function bootOnCreateTrait()
    {
        UuidTrait::bootUuidTrait();
        AddCreatedBy::boot();
    }
}
