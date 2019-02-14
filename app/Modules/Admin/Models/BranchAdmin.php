<?php

namespace App\Modules\Admin\Models;

use App\Modules\Admin\Models\Administrator;
use App\Modules\Admin\Models\AdminType;
use App\Modules\Admin\Models\AdminBranch;
use App\Modules\Core\Models\Branch;
use App\Modules\Admin\Concerns\IAdmin;


class BranchAdmin extends Administrator implements IAdmin
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
    public function adminBranches()
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
        return  $this->adminBranches->pluck('branch_id');
    }


}
