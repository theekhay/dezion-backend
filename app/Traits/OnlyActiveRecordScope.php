<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

Class OnlyActiveRecordScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        $builder->where($model->getActiveColumn(), true);
    }
}
