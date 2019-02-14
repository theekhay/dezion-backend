<?php

namespace App\Modules\Admin\Http\Requests\API;

use App\Modules\Admin\Models\AdminBranch;
use InfyOm\Generator\Request\APIRequest;

class UpdateAdminBranchAPIRequest extends APIRequest
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
        return AdminBranch::$rules;
    }
}
