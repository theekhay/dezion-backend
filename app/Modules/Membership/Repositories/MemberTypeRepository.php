<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\MemberType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MemberTypeRepository
 * @package App\Modules\Membership\Repositories
 * @version December 23, 2018, 6:22 am UTC
 *
 * @method MemberType findWithoutFail($id, $columns = ['*'])
 * @method MemberType find($id, $columns = ['*'])
 * @method MemberType first($columns = ['*'])
*/
class MemberTypeRepository extends BaseRepository
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
        return MemberType::class;
    }
}
