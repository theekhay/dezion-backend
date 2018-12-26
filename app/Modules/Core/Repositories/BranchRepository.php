<?php

namespace App\Modules\Core\Repositories;

use App\Modules\Core\Models\Branch;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BranchRepository
 * @package App\Modules\Core\Repositories
 * @version December 23, 2018, 7:21 am UTC
 *
 * @method Branch findWithoutFail($id, $columns = ['*'])
 * @method Branch find($id, $columns = ['*'])
 * @method Branch first($columns = ['*'])
*/
class BranchRepository extends BaseRepository
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
        return Branch::class;
    }
}
