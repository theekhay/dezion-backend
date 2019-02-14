<?php

namespace App\Modules\Servicemanager\Repositories;

use App\Modules\Servicemanager\Models\ServiceDataComponent;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceDataComponentRepository
 * @package App\Modules\Servicemanager\Repositories
 * @version January 14, 2019, 9:24 am UTC
 *
 * @method ServiceDataComponent findWithoutFail($id, $columns = ['*'])
 * @method ServiceDataComponent find($id, $columns = ['*'])
 * @method ServiceDataComponent first($columns = ['*'])
*/
class ServiceDataComponentRepository extends BaseRepository
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
        return ServiceDataComponent::class;
    }
}
