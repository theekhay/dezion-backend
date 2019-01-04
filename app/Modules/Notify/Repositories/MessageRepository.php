<?php

namespace App\Modules\Notify\Repositories;

use App\Modules\Notify\Models\Message;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MessageRepository
 * @package App\Modules\Notify\Repositories
 * @version January 1, 2019, 9:10 am UTC
 *
 * @method Message findWithoutFail($id, $columns = ['*'])
 * @method Message find($id, $columns = ['*'])
 * @method Message first($columns = ['*'])
*/
class MessageRepository extends BaseRepository
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
        return Message::class;
    }
}
