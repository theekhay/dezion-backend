<?php

namespace App\Modules\rolemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission;
use App\Traits\AddStatusTrait;
use App\Traits\UuidTrait;
use App\Traits\AddCreatedBy;

/**
 * @SWG\Definition(
 *      definition="SystemPermission",
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
class SystemPermission extends Permission
{
    use SoftDeletes, AddCreatedBy, UuidTrait, AddStatusTrait;

    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'alias', 'module', 'created_by', 'status', 'guard_name', 'category_id',
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

        'name' => 'required|string|unique:permissions,name',
        'category_id' => 'required|numeric|exists:permission_categories,id'
    ];


}
