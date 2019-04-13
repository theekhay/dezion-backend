<?php

namespace App\Modules\memberlocationmapping\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UuidTrait;
use App\Traits\AddCreatedBy;

/**
 * @SWG\Definition(
 *      definition="ModelAddressProximity",
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
class ModelAddressProximity extends Model
{
    use SoftDeletes, UuidTrait, AddCreatedBy;

    public $table = 'model_address_proximities';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'church_id', 'status', 'distance'
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

        'church_id' => 'required|numeric|exists:churches,id|unique:model_address_proximities',
        'mapping_data' => 'required',
    ];


}
