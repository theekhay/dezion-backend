<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class MemberMappingStatus extends Model
{


    /**
     * These are mappings that were done successfully
     *
     */
    public const SUCCESS = 109;


    /**
     * These are for failed mapping attempts
     */
    public const FAILED = 109;



    /**
     * These are for mapping attempts that didnt return anything
     *
     */
    public const UNMAPPED = 109;
}
