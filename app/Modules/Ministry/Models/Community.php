<?php

namespace App\Modules\ministry\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Community",
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
class Community extends Model
{
    use SoftDeletes;

    public $table = 'communities';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'code', 'date_created', 'uuid', 'status', 'created_by', 'updated_by', 'deleted_by',
        'district_id', 'leader_phone_number', 'leader_email', 'leader_name', 'leader_member_id'
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
        'name' => 'required|string|unique:communities',
        'code' => 'nullable|string|unique:communities',
        'date_created' => 'nullable|date',
        'district_id' => 'required|numeric|exists:districts,id',
        'leader_email' => 'nullable|email',
    ];


}
