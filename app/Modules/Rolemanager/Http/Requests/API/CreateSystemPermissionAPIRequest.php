<?php

namespace App\Modules\rolemanager\Http\Requests\API;

use App\Modules\rolemanager\Models\SystemPermission;
use InfyOm\Generator\Request\APIRequest;
use App\Modules\Admin\Models\AdminType;
use Illuminate\Support\Facades\Auth;

class CreateSystemPermissionAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $admin = Auth::user();

        /**
         * Only a superadmin should be able to perform this task
         *
         */
        if( $admin->type != AdminType::SuperAdmin )
            //return false;

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return SystemPermission::$rules;
    }
}
