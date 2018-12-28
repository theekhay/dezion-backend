<?php

namespace App\Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;

class BranchType extends Model
{

    /**
     * Default branch created by the system for every church
     * A church is allowed to have only one master branch which is generated at the creation of the church
     */
    public const MASTER = 211;

    /**
     * Branch created by an administrator
     */
    public const ADMIN = 222;
}
