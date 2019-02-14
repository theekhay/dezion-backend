<?php

namespace App\Modules\Assimilation\Repositories;

use App\Modules\Assimilation\Models\UnAssimilatedBucket;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UnAssimilatedBucketRepository
 * @package App\Modules\Assimilation\Repositories
 * @version December 29, 2018, 10:18 pm UTC
 *
 * @method UnAssimilatedBucket findWithoutFail($id, $columns = ['*'])
 * @method UnAssimilatedBucket find($id, $columns = ['*'])
 * @method UnAssimilatedBucket first($columns = ['*'])
*/
class UnAssimilatedBucketRepository extends BaseRepository
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
        return UnAssimilatedBucket::class;
    }
}
