<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\AdminBranch;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdminBranchRepository
 * @package App\Modules\Membership\Repositories
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
