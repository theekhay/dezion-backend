<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;


Class WithOnlyChurchScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        /**
         * This rule doesnt apply to the superadmin
         * The superadmin should be able to see all resources from every church
         */
       // if( ! Auth::user()->isSuperAdmin() ){

            $builder->where( $model->getChurchIdField(), Auth::user()->getChurch->id );
       // }
    }
}
