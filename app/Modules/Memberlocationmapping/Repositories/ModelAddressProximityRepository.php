<?php

namespace App\Modules\memberlocationmapping\Repositories;

use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModelAddressProximityRepository
 * @package App\Modules\memberlocationmapping\Repositories
 * @version March 2, 2019, 2:57 pm UTC
 *
 * @method ModelAddressProximity findWithoutFail($id, $columns = ['*'])
 * @method ModelAddressProximity find($id, $columns = ['*'])
 * @method ModelAddressProximity first($columns = ['*'])
*/
class ModelAddressProximityRepository extends BaseRepository
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
        return ModelAddressProximity::class;
    }
}
