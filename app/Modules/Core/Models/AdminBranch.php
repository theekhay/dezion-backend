<?php

namespace App\Modules\Core\Models;

use App\Modules\Core\Models\Branch;

class AdminBranch extends Branch
{
    protected $type;

    public function __construct($attributes = [] )
    {
        $attributes['type'] = BranchType::ADMIN;
        parent::__construct($attributes);
    }
}
