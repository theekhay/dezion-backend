<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

use App\Modules\Membership\Models\AdminBranch;
use App\Modules\Membership\Models\AdminType;



Class WithOnlyBranchScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        $builder->whereIn( $model->getBranchIdField(), Auth::user()->adminType()->pluckAdminBranches() );
    }
}
