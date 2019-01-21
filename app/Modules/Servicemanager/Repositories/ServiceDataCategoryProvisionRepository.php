<?php

namespace App\Modules\Servicemanager\Repositories;

use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceDataCategoryProvisionRepository
 * @package App\Modules\Servicemanager\Repositories
 * @version January 16, 2019, 5:39 am UTC
 *
 * @method ServiceDataCategoryProvision findWithoutFail($id, $columns = ['*'])
 * @method ServiceDataCategoryProvision find($id, $columns = ['*'])
 * @method ServiceDataCategoryProvision first($columns = ['*'])
*/
class ServiceDataCategoryProvisionRepository extends BaseRepository
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
        return ServiceDataCategoryProvision::class;
    }
}
