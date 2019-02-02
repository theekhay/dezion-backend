<?php

namespace App\Modules\rolemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Models
use Spatie\Permission\Models\Permission;

//Traits
use App\Traits\UuidTrait;
use App\Traits\AddCreatedBy;
use App\Traits\AddStatusTrait;

/**
 * @SWG\Definition(
 *      definition="PermissionCategory",
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
class PermissionCategory extends Model
{
    use SoftDeletes, AddCreatedBy, AddStatusTrait, UuidTrait;

    public $table = 'permission_categories';

    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'code', 'allowed', 'excluded'
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

        'name' => 'required|string|unique:permission_categories',
        'code' => 'nullable|unique:permission_categories|max:10|alpha_dash'
    ];



    /**
     * Defines the relationahip between a permission and the category/module it belongs to
     * A module would usually have many permissions
     * and each permisson would belong to a category/module
     */
    public function permisssions(){

        return $this->hasMany( Permission::class, 'category_id' );
    }


}
