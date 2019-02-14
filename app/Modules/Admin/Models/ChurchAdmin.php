<?php

namespace App\Modules\Admin\Models;

//models
use App\Modules\Admin\Models\Administrator;
use App\Modules\Admin\Models\AdminType;
use App\Modules\Core\Models\MasterBranch;
use App\Modules\Core\Models\Branch;
use App\Models\ModelStatus;
use App\Traits\WithOnlyChurchTrait;
use App\Modules\Core\Models\Church;
use App\Modules\Admin\Concerns\IAdmin;

class ChurchAdmin extends Administrator implements IAdmin
{
    use WithOnlyChurchTrait;

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
     * typically this should be all active branches created by the church the admin belongs to
     */
    public function getAdminbranches()
    {
        return Branch::all();
    }


    /**
     * Gets the list of branch_id an admin has been assigned to.
     * @return array
     */
    public function pluckBranches()
    {
        return  $this->getAdminbranches()->pluck('id');
    }

}
