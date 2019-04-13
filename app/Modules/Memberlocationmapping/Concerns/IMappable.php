<?php

namespace App\Modules\Memberlocationmapping\Concerns;

interface IMappable{


    /**
     * This would get the list of address for the model that implements this contract
     * @return array
     */
    public static function getAddresses() : array;


    //public function map(IMappable $m);


    /**
     * returns the list of the model mapping from central
     */
    //public function getModelProximityFromCentral();

}
