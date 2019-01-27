<?php

namespace App\Modules\RoleManager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\WithOnlyChurchTrait;
use App\Traits\AddStatusTrait;
use App\Traits\AddCreatedBy;
use App\Traits\UuidTrait;


/**
 * @SWG\Definition(
 *      definition="Role",
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
class Role extends Model
{
    use SoftDeletes, WithOnlyChurchTrait, AddStatusTrait, AddCreatedBy, UuidTrait;

    public $table = 'roles';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',  'created_by', 'deleted_by', 'status', 'church_id', 'guard_name'
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

        'church_id' => 'required|numeric|exists:churches,id',
        'name' => 'required|string|unique_with:roles,church_id',
        'guard_name' => 'nullable|unique_with:roles,church_id',
        'status' => 'required|numeric' //add a validator to make sure status are in the allowed list
    ];


}
