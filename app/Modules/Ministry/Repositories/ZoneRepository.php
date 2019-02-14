<?php

namespace App\Modules\ministry\Repositories;

use App\Modules\ministry\Models\Zone;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ZoneRepository
 * @package App\Modules\ministry\Repositories
 * @version January 28, 2019, 2:48 am UTC
 *
 * @method Zone findWithoutFail($id, $columns = ['*'])
 * @method Zone find($id, $columns = ['*'])
 * @method Zone first($columns = ['*'])
*/
class ZoneRepository extends BaseRepository
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
        return Zone::class;
    }
}
