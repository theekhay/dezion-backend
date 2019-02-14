<?php

namespace App\Modules\rolemanager\Repositories;

use App\Modules\rolemanager\Models\PermissionCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionCategoryRepository
 * @package App\Modules\rolemanager\Repositories
 * @version February 1, 2019, 3:01 am UTC
 *
 * @method PermissionCategory findWithoutFail($id, $columns = ['*'])
 * @method PermissionCategory find($id, $columns = ['*'])
 * @method PermissionCategory first($columns = ['*'])
*/
class PermissionCategoryRepository extends BaseRepository
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
        return PermissionCategory::class;
    }
}
