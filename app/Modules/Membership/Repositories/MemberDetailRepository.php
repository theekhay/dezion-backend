<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\MemberDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MemberDetailRepository
 * @package App\Modules\Membership\Repositories
 * @version December 24, 2018, 11:54 am UTC
 *
 * @method MemberDetail findWithoutFail($id, $columns = ['*'])
 * @method MemberDetail find($id, $columns = ['*'])
 * @method MemberDetail first($columns = ['*'])
*/
class MemberDetailRepository extends BaseRepository
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
        return MemberDetail::class;
    }
}
