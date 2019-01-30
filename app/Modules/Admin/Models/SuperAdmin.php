<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Concerns\IAdmin;

class SuperAdmin extends Model implements IAdmin
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
