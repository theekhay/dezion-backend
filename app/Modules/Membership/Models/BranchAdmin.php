<?php

namespace App\Modules\Membership\Models;

use App\Modules\Membership\Models\Administrator;
use App\Modules\Membership\Models\AdminType;
use App\Modules\Membership\Models\AdminBranch;
use App\Modules\Core\Models\Branch;

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


    /**
     * Gets the branches an admin has access to
     * These typically
     * @return AdminBranch
     */
    public function branches()
    {
        return $this->hasMany( AdminBranch::class, 'admin_id' );
    }


    /**
     * returns a collection of branches that a branch admin has access to.
     * @return collection
     */
    public function getAdminbranches()
    {
        return Branch::whereIn( 'id', $this->pluckBranches() )->get();
    }


    /**
     * Gets the list of branch_id an admin has been assigned to.
     * @return array
     */
    public function pluckBranches()
    {
        return  $this->branches->pluck('branch_id');
    }


}
