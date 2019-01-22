<?php

namespace App\Modules\Servicemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Modules\Core\Models\Church;
use App\Traits\UuidTrait;
use App\Traits\OnlyActive;
use App\Traits\AddStatusTrait;

/**
 * @SWG\Definition(
 *      definition="ServiceDataComponent",
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
class ServiceDataComponent extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait, OnlyActive, AddStatusTrait;

    public $table = 'service_data_components';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'church_id', 'allowed_branches', 'code', 'service_data_category_id'
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

        'name' => 'required|string',
        'code' => 'nullable|string|max:10|unique_with:service_data_components,church_id',
        'service_data_category_id' => 'required|numeric|exists:service_data_categories,id|unique_with:service_data_components,name',
        'allowed_branches' => 'nullable|json',
    ];



    /**
     * Defins the relationship between a church and service components
     * service component are direct data sources e.g
     * while attendance is a data category, adult male attendance is a data component.
     */
    public function serviceCategory()
    {
        return $this->belongsTo( ServiceDataCategory::class );
    }

}
