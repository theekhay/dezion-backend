<?php

namespace App\Modules\Servicemanager\Repositories;

use App\Modules\Servicemanager\Models\ServiceDataCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServiceDataCategoryRepository
 * @package App\Modules\Servicemanager\Repositories
 * @version January 13, 2019, 5:28 am UTC
 *
 * @method ServiceDataCategory findWithoutFail($id, $columns = ['*'])
 * @method ServiceDataCategory find($id, $columns = ['*'])
 * @method ServiceDataCategory first($columns = ['*'])
*/
class ServiceDataCategoryRepository extends BaseRepository
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
        return ServiceDataCategory::class;
    }
}
