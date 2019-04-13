<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Class WithOnlyChurchScope implements Scope{


    /**
     * These are the routes to be ignored when applying this scope
     * A better approach would be to use non-authenticated routed approach
     */
    private static $excludeRoute = [
        'api/v1/admin/branch/create/{church_key}',
        'api/v1/churches/test',
    ];


    public function apply(Builder $builder, Model $model)
    {
        /**
         * This rule doesnt apply to the superadmin
         * The superadmin should be able to see all resources from every church
         */
       // if( ! Auth::user()->isSuperAdmin() ){
            if( ( ! in_array( Route::getFacadeRoot()->current()->uri(), self::$excludeRoute) )){

                $builder->where( $model->getChurchIdField(), Auth::user()->getChurch->id );
            }

       // }
    }
}
