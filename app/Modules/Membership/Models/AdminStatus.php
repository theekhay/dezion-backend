<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStatus extends Model
{
    /**
     * These are for active administrators
     */
    public const ACTIVE = 211;


    /**
     * This is for administrators that are awaiting approval
     */
    public const PENDING_APPROVAL = 233;


    /**
     * These are resources that have been marked as inactive
     * these should be done by the church admin
     */
    public const INACTIVE = 266;
}
