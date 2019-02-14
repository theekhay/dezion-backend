<?php

namespace App\Modules\Workflow\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Workflow\Models\WorkflowSteps;

/**
 * @SWG\Definition(
 *      definition="Workflow",
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
class Workflow extends Model
{
    use SoftDeletes;

    public $table = 'workflows';


    protected $dates = ['deleted_at'];


    public $fillable = [

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

    ];



    /**
     * Returns the steps in a workflow
     * @return Workflow
     */
    public function steps()
    {
        return $this->hasMany( WorkflowSteps::class );
    }


}
