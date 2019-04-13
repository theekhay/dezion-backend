<?php

namespace App\Modules\memberlocationmapping\Models;

use Illuminate\Database\Eloquent\Model;

class MappingModelStatus extends Model
{


    /**
     * addresses that returned {"status":"OK"} from central.
     */
    public const VALID = 222;


    /**
     * For addresses that were either {"status":"ZERO_RESULTS"} OR {"status":"NOT_FOUND"}
     * This typicslly means the address couldn't be resolved or the aaddress is wrong and cannot be used in the mapping process.
     */
    public const INVALID = 777;
}
