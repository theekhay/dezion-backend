<?php

namespace App\Modules\Membership\Models;

use Eloquent as Model;
use App\Modules\Core\Models\Church;
use App\Modules\Core\Models\Branch;
use App\Modules\Membership\Models\AdminBranch;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AddCreatedBy;
use App\Models\User;
use App\Modules\Notify\Traits\MessageTrait;


/**
 * @SWG\Definition(
 *      definition="Administrator",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Administrator extends User
{
    use SoftDeletes, AddCreatedBy, MessageTrait;

    public $table = 'administrators';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstname', 'surname', 'email', 'telephone', 'member_id', 'church_id', 'password', 'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'firstname' => 'required|string|alpha',
        'surname' => 'required|string|alpha',
        'email' => 'required|email|unique_with:administrators,church_id',
        'telephone' => 'required|numeric|unique_with:administrators,church_id',
        'church_id' => 'required|numeric|exists:churches,id',
        'member_id' => 'nullable|numeric|exists:member_details,id',
        'username' => 'nullable|alpha_dash|unique_with:administrators,church_id',
        'password' => 'required|min',
    ];


    /**
     * Gets the church the admin belongs to
     * @return Church
     */
    public function getChurch()
    {
        return $this->belongsTo( Church::class, 'id' );
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
     * Checks if an admin is authorized for a branch
     * superadmins and church admins have access to all branches in their church
     * @return bool
     */
    public function canAccess( Branch $branch ) : bool
    {
        if( $this->type == AdminType::SuperAdmin || $this->type == AdminType::ChurchAdmin )
            return true;

        AdminBranch::where(['branch_id', $branch->id, 'admin_id' => Auth::id()])->count() > 0 ;
    }


    /**
     * checks if an admin is a church admin
     * @return bool
     */
    public function isChurchAdmin() : bool
    {
        return $this->type == AdminType::ChurchAdmin;
    }


    /**
     * checks if an admin is a super admin
     * @return bool
     */
    public function isSuperAdmin() : bool
    {
        return $this->type == AdminType::SuperAdmin;
    }



    /**
     * Assigns an admin to a branch
     * In the controller make sure this can only be perfomed by a church-level admin or a superadmin
     */
    // public function assignTo( Branch $branch)
    // {
    //     $adminBranch = new AdminBranch([ 'admin_id' => $this->id, 'branch_id' => $branch->id]);
    //     $adminBranch->save();
    // }

    public function toChurchAdmin(){

        if( $this->type = AdminType::ChurchAdmin){

            return ChurchAdmin::find($this->id);

        }
    }
}
