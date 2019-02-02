<?php

namespace App\Modules\Admin\Models;

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
     * after which they are updated to active.
     */
    public const PENDING_EMAIL_CONFIRMATION = 255;


    /**
     * These are admins that have been marked as inactive
     * these should be done by the church admin or superadmin
     */
    public const INACTIVE = 266;



    /**
     * This ar for accounts that have been suspended
     *
     */
    public const SUSPENDED = 277;



    /**
     * This holds the error message to be displayed to the user on login
     * only active users are allowed to sign in, for non-active users,
     * the corresponding message that matches the users status would be displayed to the user.
     *
     */
    public static $statusMessage = [

        self::PENDING_EMAIL_CONFIRMATION => "Your account has not been comfimed. Kindly click on the link sent to your email to activate to your account ",
        self::PENDING_APPROVAL => "Unable to log you in at this moment. Your account is pending approval.",
        self::INACTIVE => "unauthorized. This account is inactive. "
    ];
}
