<?php

namespace App\Modules\Membership\Repositories;

use App\Modules\Membership\Models\BulkMemberImport;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BulkMemberImportRepository
 * @package App\Modules\Membership\Repositories
 * @version December 24, 2018, 4:55 pm UTC
 *
 * @method BulkMemberImport findWithoutFail($id, $columns = ['*'])
 * @method BulkMemberImport find($id, $columns = ['*'])
 * @method BulkMemberImport first($columns = ['*'])
*/
class BulkMemberImportRepository extends BaseRepository
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
        return BulkMemberImport::class;
    }



}
