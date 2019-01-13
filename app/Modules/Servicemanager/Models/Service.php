<?php

namespace App\Modules\ServiceManager\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Core\Models\Branch;
use App\Traits\AddCreatedBy;

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
    use SoftDeletes, AddCreatedBy;

    public $table = 'services';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'code', 'branch_id', 'created_by', 'deleted_by', 'active'
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

        'name' => 'required|alpha_dash|unique_with:services,branch_id',
        'branch_id' => 'required|numeric|exists:branches,id',
        'code' => 'nullable|max:10|unique_with:services,branch_id',
    ];



    /**
     * Defines the relationship between a service and a branch
     * each service belongs to a branch
     */
    public function branch()
    {
        return $this->belongsTo( Branch::class);
    }


}
