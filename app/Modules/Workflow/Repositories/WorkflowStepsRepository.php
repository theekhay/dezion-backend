<?php

namespace App\Modules\Workflow\Repositories;

use App\Modules\Workflow\Models\WorkflowSteps;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WorkflowStepsRepository
 * @package App\Modules\Workflow\Repositories
 * @version December 29, 2018, 10:29 pm UTC
 *
 * @method WorkflowSteps findWithoutFail($id, $columns = ['*'])
 * @method WorkflowSteps find($id, $columns = ['*'])
 * @method WorkflowSteps first($columns = ['*'])
*/
class WorkflowStepsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WorkflowSteps::class;
    }
}
