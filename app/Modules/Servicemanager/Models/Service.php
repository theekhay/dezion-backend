<?php

namespace App\Modules\ServiceManager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Core\Models\Branch;
use App\Traits\AddCreatedBy;
use App\Modules\Core\Models\Church;
use App\Modules\Servicemanager\Models\ServiceDataCategory;
use App\Modules\Servicemanager\Models\ServiceDataComponent;
use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use App\Traits\UuidTrait;
use App\Traits\OnlyActive;
use App\Traits\AddStatusTrait;
use App\Traits\WithOnlyChurchTrait;

/**
 * @SWG\Definition(
 *      definition="Service",
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
class Service extends Model
{
    use SoftDeletes, AddCreatedBy, UuidTrait, OnlyActive, AddStatusTrait, WithOnlyChurchTrait;

    public $table = 'services';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'church_id', 'created_by', 'deleted_by', 'active'
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

        'name' => 'required|string|unique_with:services,church_id',
        'church_id' => 'required|numeric|exists:churches,id',
        'code' => 'nullable|alpha_dash|max:10|unique_with:services,church_id',
    ];



    /**
     * Defines the relationship between a service and a branch
     * each service belongs to a branch
     */
    public function church()
    {
        return $this->belongsTo( Church::class);
    }


    /**
     * Defines the link between a service and its data categoried
     */
    public function dataCategories()
    {
        return $this->hasMany( ServiceDataCategoryProvision::class, 'service_id' );
    }


    /**
     * Defines the link between a service and its data components
     * TODO come back to this function to make sure it is working
     */
    // public function dataComponents()
    // {
    //     return $this->hasManyThrough( ServiceDataComponent::class, ServiceDataCategoryProvision::class );
    // }


}
