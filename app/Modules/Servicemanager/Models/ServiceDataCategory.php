<?php

namespace App\Modules\Servicemanager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Modules\Core\Models\Church;
use App\Modules\ServiceManager\Models\Service;

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



    /**
     * Defines the relationshop between a church and its service component
     * Service categories are like data points that service Data components are attached to.
     */
    public function church()
    {
        return $this->belongsTo( Church::class );
    }


    /**
     * defines the relatiosnhip between a service category and its components
     * a service category can have one or more components
     */
    public function dataComponents()
    {
        return $this->hasMany( ServiceDataComponent::class, 'service_data_category_id' );
    }


    /**
     * This provisons a service data category component for a service
     * @param ServiceDataCategory $dataCategory
     * @return ServiceDataCategoryProvision
     */
    public function provisionFor( Service $service) : ServiceDataCategoryProvision {

        $data_category_provision = new ServiceDataCategoryProvision;
        $data_category_provision->service_id = $service->id;
        $data_category_provision->service_data_category_id = $this->id;
        $data_category_provision->save();
        return $component_provision; //this should be tested
    }


}
