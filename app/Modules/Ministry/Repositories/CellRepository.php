<?php

namespace App\Modules\ministry\Repositories;

use App\Modules\ministry\Models\Cell;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CellRepository
 * @package App\Modules\ministry\Repositories
 * @version January 27, 2019, 11:28 am UTC
 *
 * @method Cell findWithoutFail($id, $columns = ['*'])
 * @method Cell find($id, $columns = ['*'])
 * @method Cell first($columns = ['*'])
*/
class CellRepository extends BaseRepository
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
        return Cell::class;
    }
}
