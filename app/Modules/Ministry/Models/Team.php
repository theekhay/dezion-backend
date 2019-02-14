<?php

namespace App\Modules\Ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UuidTrait;
use App\Traits\AddCreatedBy;
use App\Traits\AddStatusTrait;

/**
 * @SWG\Definition(
 *      definition="Team",
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
class Team extends Model
{
    use SoftDeletes, UuidTrait, AddCreatedBy, AddStatusTrait;

    public $table = 'teams';


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
        'name' => 'required|string|unique:teams,name',
        'code' => 'nullable|unique:teams,code|max:10|alpha_num',

        //add existence of head on memberdetails table, there should be a setting if the head should be unique
        'head' => 'nullable|numeric',
    ];


}
