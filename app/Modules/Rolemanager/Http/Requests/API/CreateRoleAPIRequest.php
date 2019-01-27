<?php

namespace App\Modules\RoleManager\Http\Requests\API;

use App\Modules\RoleManager\Models\Role;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Support\Facades\Auth;

class CreateRoleAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $admin = Auth::user();

        //branch admins cannit create roles
        if ( $admin->isBranchAdmin() ){
            return false;
        }

        //the church must be the same as the authenticated user's church
        if( $admin->isChurchAdmin() && $this->church_id != $admin->church_id){
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Role::$rules;
    }
}
