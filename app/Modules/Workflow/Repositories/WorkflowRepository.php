<?php

namespace App\Modules\Workflow\Repositories;

use App\Modules\Workflow\Models\Workflow;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WorkflowRepository
 * @package App\Modules\Workflow\Repositories
 * @version December 29, 2018, 10:31 pm UTC
 *
 * @method Workflow findWithoutFail($id, $columns = ['*'])
 * @method Workflow find($id, $columns = ['*'])
 * @method Workflow first($columns = ['*'])
*/
class WorkflowRepository extends BaseRepository
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
        return Workflow::class;
    }
}
