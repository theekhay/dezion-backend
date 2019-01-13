<?php

namespace App\Modules\Servicemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;

/**
 * @SWG\Definition(
 *      definition="ServiceDataCategory",
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
class ServiceDataCategory extends Model
{
    use SoftDeletes, AddCreatedBy;

    public $table = 'service_data_categories';


    protected $dates = ['deleted_at'];


    public $fillable = [

        'name', 'church_id', 'created_by', 'deleted_by', 'code'
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
        'name' => 'required|alpha_dash|unique_with:service_data_categories,church_id',
        'code' => 'nullable|max:10|alpha_num|unique_with:service_data_categories,church_id'
    ];


}
