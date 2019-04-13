<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Models\AdminType;

Class OnlyChurchAdminScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        $builder->where( $model->getAdminTypeColumn(), AdminType::ChurchAdmin);
    }


    /**
     * adds the models that have status pending to the retreived list.
     *
     */
    public function withPending()
    {
        //
    }
}
