<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Models\ModelStatus as STATUS;
use Illuminate\Support\Facades\Auth;

Class OnlyActiveRecordScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        $builder->where( $model->getActiveColumn(), STATUS::ACTIVE);
    }


    /**
     * adds the models that have status pending to the retreived list.
     *
     */
    public function withPending()
    {

    }
}
