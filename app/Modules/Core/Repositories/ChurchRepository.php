<?php

namespace App\Modules\Core\Repositories;

use App\Modules\Core\Models\Church;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChurchRepository
 * @package App\Modules\Core\Repositories
 * @version December 23, 2018, 7:15 am UTC
 *
 * @method Church findWithoutFail($id, $columns = ['*'])
 * @method Church find($id, $columns = ['*'])
 * @method Church first($columns = ['*'])
*/
class ChurchRepository extends BaseRepository
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
        return Church::class;
    }
}
