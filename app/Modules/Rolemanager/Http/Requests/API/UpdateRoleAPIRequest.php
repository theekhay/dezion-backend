<?php

namespace App\Modules\RoleManager\Http\Requests\API;

use App\Modules\RoleManager\Models\Role;
use InfyOm\Generator\Request\APIRequest;

class UpdateRoleAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
