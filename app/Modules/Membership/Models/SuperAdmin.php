<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{

    public function __construct( $attributes = [] )
    {
        $attributes['type'] = AdminType::SuperAdmin;
        parent::__construct($attributes);
    }


    /**
     * gets all branches
     *
     */
    public function getAdminbranches()
    {
        return Branch::all();
    }
}
