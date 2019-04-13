<?php

namespace App\Traits;


trait HasMapping
{


    /**
     * Gets the addresses to be used when mapping.
     * @return
     */
    public static function getAddresses(): array{

        $addresses = self::pluck('address', 'id');
        return array_unique ( array_map('trim', $addresses->all() ) ) ;

    }


    /**
     * Returns the addresses of the current model and their proximity from central
     * @return Collection
     */
    public function getModelProximityFromCentral(){


    }




}
