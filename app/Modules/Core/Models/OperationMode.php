<?php

namespace App\Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;

class OperationMode extends Model
{

    /**
     * This are for churches that are completely live
     */
    public const LIVE = 111;


    /**
     * These are for churches that are on a trail period or base
     */
    public const PILOT = 112;


    /**
     * This is for demo purposes
     * They should point to another db
     */
    public const DEMO = 113;


    /**
     * This is for internal testing.
     * They should point to another DB
     */
    public const TEST = 114;

}
