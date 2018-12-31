<?php

namespace App\Modules\Workflow\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Workflow\Models\Workflow;


class WorkflowSteps extends Model
{
    use SoftDeletes;

    public $table = 'workflow_steps';


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
     * Returns the workflow a workflow step belongs to
     * @return Workflow
     */
    public function workflow()
    {
        return $this->belongsTo( Workflow::class );
    }


}
