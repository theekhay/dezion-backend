<?php

namespace App\Modules\rolemanager\Repositories;

use App\Modules\rolemanager\Models\SystemPermission;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SystemPermissionRepository
 * @package App\Modules\rolemanager\Repositories
 * @version January 31, 2019, 6:56 am UTC
 *
 * @method SystemPermission findWithoutFail($id, $columns = ['*'])
 * @method SystemPermission find($id, $columns = ['*'])
 * @method SystemPermission first($columns = ['*'])
*/
class SystemPermissionRepository extends BaseRepository
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
        return SystemPermission::class;
    }
}
