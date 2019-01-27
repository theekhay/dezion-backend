<?php

namespace App\Modules\Ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Traits\UuidTrait;
use App\Traits\AddStatusTrait;

/**
 * @SWG\Definition(
 *      definition="District",
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
class District extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait, AddStatusTrait;


    public $table = 'districts';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'code', 'created_by', 'uuid', 'head', 'deleted_by', 'status', 'updated_by'
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

        'name' => 'required|string|unique:districts,name',
        'code' => 'nullable|unique|alpha_num|max:10|unique:districts,code',
        'head' => 'nullable|numeric',
        //'status' => 'required|numeric',
       // 'uuid' => 'required|unique:districts,uuid'
    ];


}
