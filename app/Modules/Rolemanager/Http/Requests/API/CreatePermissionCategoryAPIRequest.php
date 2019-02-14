<?php

namespace App\Modules\rolemanager\Http\Requests\API;

use App\Modules\rolemanager\Models\PermissionCategory;
use InfyOm\Generator\Request\APIRequest;

class CreatePermissionCategoryAPIRequest extends APIRequest
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
        return PermissionCategory::$rules;
    }
}
