<?php

namespace App\Modules\Admin\Traits;

use App\Modules\Admin\Models\AdminStatus;
use App\Modules\Admin\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Trait SetAdminStatusTrait{


    /**
     * List of routed to exclude when appplying this scope.
     */
    private static $excludeRouteForSetAdminStatusTrait = [

        'api/v1/admin/branch/create/{church_key}',
        'api/v1/churches/register',
    ];

    public static function bootSetAdminStatusTrait()
    {
        self::setStatus();
    }


     /**
     * Defines the statua field for the model.
     * @return string
     */
    protected static function statusField()
    {
        return 'status';
    }


    /**
     * This automatically sets the admin status based on how it being created
     */
    public static function setStatus()
    {
        static::creating(function ($model) {

            //if the resource was created by a branchadmin then it should be approved by the super admin
            //before it becomes fully publicly accessible to other admins.
            if( ( ! in_array(Route::getFacadeRoot()->current()->uri(), self::$excludeRouteForSetAdminStatusTrait) )){

                $model->{self::statusField()} = ( Auth::user()->isBranchAdmin() ) ? AdminStatus::PENDING_APPROVAL :  AdminStatus::ACTIVE ;
            }

        });
    }
}
