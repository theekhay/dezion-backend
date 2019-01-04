<?php

namespace App\Modules\Membership\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    private $type;

    public function __construct( $attributes = [] )
    {
        $attributes['type'] = AdminType::SuperAdmin;
        parent::__construct($attributes);
    }
}
