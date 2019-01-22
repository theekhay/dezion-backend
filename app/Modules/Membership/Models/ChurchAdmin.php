<?php

namespace App\Modules\Membership\Models;

//models
use App\Modules\Membership\Models\Administrator;
use App\Modules\Membership\Models\AdminType;
use App\Modules\Core\Models\MasterBranch;
use App\Modules\Core\Models\Branch;
use App\Models\ModelStatus;

class ChurchAdmin extends Administrator
{

    private $type;


    public function __construct( $attributes = [] )
    {
        $attributes['type'] = AdminType::ChurchAdmin;
        parent::__construct($attributes);
    }



    /**
     * Assigns an admin to a branch
     * In the controller make sure this can only be perfomed by a church-level admin or a superadmin
     */
    public function assignTo( MasterBranch $branch)
    {
        $adminBranch = new AdminBranch([ 'admin_id' => $this->id, 'branch_id' => $branch->id, 'status' => ModelStatus::ACTIVE] );
        $adminBranch->save();
    }


    /**
     * gets all the branches accessible by a superadmin
     */
    public function branches()
    {
        return Branch::where('church_id', $this->church_id);
    }
}
