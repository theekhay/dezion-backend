<?php

namespace App\Modules\ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UuidTrait;
use App\Traits\AddStatusTrait;
use App\Traits\OnlyActive;
use App\Traits\AddCreatedBy;


/**
 * @SWG\Definition(
 *      definition="Zone",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Zone extends Model
{
    use SoftDeletes, UuidTrait, AddStatusTrait, OnlyActive, AddCreatedBy ;

    public $table = 'zones';


    protected $dates = ['deleted_at'];


    public $fillable = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
