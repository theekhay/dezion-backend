<?php

namespace App\Modules\finmanager\Repositories;

use App\Modules\finmanager\Models\CardTransaction;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CardTransactionRepository
 * @package App\Modules\finmanager\Repositories
 * @version February 27, 2019, 3:13 pm UTC
 *
 * @method CardTransaction findWithoutFail($id, $columns = ['*'])
 * @method CardTransaction find($id, $columns = ['*'])
 * @method CardTransaction first($columns = ['*'])
*/
class CardTransactionRepository extends BaseRepository
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
        return CardTransaction::class;
    }
}
