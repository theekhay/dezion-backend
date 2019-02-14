<?php

namespace App\Modules\Admin\Repositories;

use App\Modules\Admin\Models\AdminBranch;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdminBranchRepository
 * @package App\Modules\Admin\Repositories
 * @version December 29, 2018, 2:30 pm UTC
 *
 * @method AdminBranch findWithoutFail($id, $columns = ['*'])
 * @method AdminBranch find($id, $columns = ['*'])
 * @method AdminBranch first($columns = ['*'])
*/
class AdminBranchRepository extends BaseRepository
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
        return AdminBranch::class;
    }
}
