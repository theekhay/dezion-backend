<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\Administrator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdministratorRepository
 * @package App\Modules\Membership\Repositories
 * @version December 28, 2018, 10:28 am UTC
 *
 * @method Administrator findWithoutFail($id, $columns = ['*'])
 * @method Administrator find($id, $columns = ['*'])
 * @method Administrator first($columns = ['*'])
*/
class AdministratorRepository extends BaseRepository
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
        return Administrator::class;
    }
}
