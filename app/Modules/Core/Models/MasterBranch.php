<?php

namespace App\Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Core\Models\Branch;
use App\Modules\Core\Models\BranchType;
use App\Modules\Core\Models\Church;

class MasterBranch extends Branch
{


    protected $type;

    public function __construct($attributes = [] )
    {
        $attributes['type'] = BranchType::MASTER;
        parent::__construct($attributes);
    }

}
