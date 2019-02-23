<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\CellMemberMapping;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CellMemberMappingRepository
 * @package App\Modules\Membership\Repositories
 * @version February 23, 2019, 11:51 am UTC
 *
 * @method CellMemberMapping findWithoutFail($id, $columns = ['*'])
 * @method CellMemberMapping find($id, $columns = ['*'])
 * @method CellMemberMapping first($columns = ['*'])
*/
class CellMemberMappingRepository extends BaseRepository
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
        return CellMemberMapping::class;
    }
}
