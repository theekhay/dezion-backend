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
     * When an admin signs up they would usually have to verify their email address
     * The default status is 255 until they comfirm their email address.
     */
    public const PENDING_EMAIL_CONFIRMATION = 255;


    /**
     * These are admins that have been marked as inactive
     * these should be done by the church admin or superadmin
     */
    public const INACTIVE = 266;
}
