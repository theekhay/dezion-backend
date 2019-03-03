<?php

namespace App\Modules\finmanager\Repositories;

use App\Modules\finmanager\Models\Card;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CardRepository
 * @package App\Modules\finmanager\Repositories
 * @version February 27, 2019, 2:28 pm UTC
 *
 * @method Card findWithoutFail($id, $columns = ['*'])
 * @method Card find($id, $columns = ['*'])
 * @method Card first($columns = ['*'])
*/
class CardRepository extends BaseRepository
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
        return Card::class;
    }
}
