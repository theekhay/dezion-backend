<?php

namespace App\Modules\ministry\Repositories;

use App\Modules\ministry\Models\Community;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CommunityRepository
 * @package App\Modules\ministry\Repositories
 * @version January 28, 2019, 2:42 am UTC
 *
 * @method Community findWithoutFail($id, $columns = ['*'])
 * @method Community find($id, $columns = ['*'])
 * @method Community first($columns = ['*'])
*/
class CommunityRepository extends BaseRepository
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
        return Community::class;
    }
}
