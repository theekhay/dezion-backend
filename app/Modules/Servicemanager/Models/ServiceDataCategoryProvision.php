<?php

namespace App\Modules\Servicemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Traits\UuidTrait;
use App\Traits\OnlyActive;
use App\Traits\AddStatusTrait;

/**
 * @SWG\Definition(
 *      definition="ServiceDataCategoryProvision",
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
class ServiceDataCategoryProvision extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait, OnlyActive, AddStatusTrait;

    public $table = 'service_data_category_provisions';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'service_id', 'service_data_category_id', 'created_by'
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
        'service_id' => 'required|numeric|exists:services,id',
        'service_data_category_id' => 'required|numeric|exists:service_data_categories,id|unique_with:service_data_category_provisions,service_id',

    ];


    /**
     * Gets the associated data category with this provision instance
     * @return ServiceDataCategory
     */
    public function dataCategory(){

        return $this->hasOne( ServiceDataCategory::class, 'id', 'service_data_category_id' );
    }


}
