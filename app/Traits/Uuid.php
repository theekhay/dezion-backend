<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

Trait UuidTrait
{

    /**
     * Generate UUID v4 when creating model.
     */
    // protected static function boot()
    // {
    //     parent::boot();

    //     self::genUuid();
    // }

    /**
     * Defines the UUID field for the model.
     * @return string
     */
    protected static function uuidField()
    {
        return 'uuid';
    }

    /**
     * Use if boot() is overridden in the model.
     */
    protected static function genUuid()
    {
        static::creating(function ($model) {
            $model->{self::uuidField()} = Uuid::uuid4()->toString();
        });
    }


    public static function bootUuidTrait()
    {
       // parent::boot();
       self::genUuid();
    }
}
