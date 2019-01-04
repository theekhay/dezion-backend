<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{

    /**
     * Church level administrator
     * There should be only one of this per time
     */
    public const ChurchAdmin = 311;

    /**
     * Branch level administrator
     * These can have access to multiple branches
     */
    public const BranchAdmin = 322;


    /**
     * super admin
     */
    public const SuperAdmin = 333;
}