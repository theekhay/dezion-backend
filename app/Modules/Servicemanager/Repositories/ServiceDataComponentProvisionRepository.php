<?php

namespace App\Modules\Servicemanager\Repositories;

use App\Modules\Servicemanager\Models\ServiceDataComponentProvision;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceDataComponentProvisionRepository
 * @package App\Modules\Servicemanager\Repositories
 * @version January 16, 2019, 5:44 am UTC
 *
 * @method ServiceDataComponentProvision findWithoutFail($id, $columns = ['*'])
 * @method ServiceDataComponentProvision find($id, $columns = ['*'])
 * @method ServiceDataComponentProvision first($columns = ['*'])
*/
class ServiceDataComponentProvisionRepository extends BaseRepository
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
        return ServiceDataComponentProvision::class;
    }
}
