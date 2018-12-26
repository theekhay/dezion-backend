<?php

namespace App\Modules\Ministry\Repositories;

use App\Modules\Ministry\Models\Team;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TeamRepository
 * @package App\Modules\Ministry\Repositories
 * @version December 24, 2018, 10:02 am UTC
 *
 * @method Team findWithoutFail($id, $columns = ['*'])
 * @method Team find($id, $columns = ['*'])
 * @method Team first($columns = ['*'])
*/
class TeamRepository extends BaseRepository
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
        return Team::class;
    }
}
