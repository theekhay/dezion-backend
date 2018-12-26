<?php

namespace App\Modules\Ministry\Repositories;

use App\Modules\Ministry\Models\District;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistrictRepository
 * @package App\Modules\Ministry\Repositories
 * @version December 24, 2018, 10:09 am UTC
 *
 * @method District findWithoutFail($id, $columns = ['*'])
 * @method District find($id, $columns = ['*'])
 * @method District first($columns = ['*'])
*/
class DistrictRepository extends BaseRepository
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
        return District::class;
    }
}
