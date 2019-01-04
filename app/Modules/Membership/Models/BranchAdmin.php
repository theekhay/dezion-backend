<?php

namespace App\Modules\Membership\Models;

use App\Modules\Membership\Models\Administrator;
use App\Modules\Membership\Models\AdminType;
use App\Modules\Membership\Models\AdminBranch;

class BranchAdmin extends Administrator
{

    public function __construct( $attributes = [] )
    {
        $attributes['type'] = AdminType::BranchAdmin;
        parent::__construct($attributes);
    }



    /**
     * Assigns an admin to a branch
     * In the controller make sure this can only be perfomed by a church-level admin or a superadmin
     */
    public function assignTo( AdminBranch $branch)
    {
        $adminBranch = new AdminBranch([ 'admin_id' => $this->id, 'branch_id' => $branch->id]);
        $adminBranch->save();
    }
}
