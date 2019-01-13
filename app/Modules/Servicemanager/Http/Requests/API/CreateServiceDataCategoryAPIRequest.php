<?php

namespace App\Modules\Servicemanager\Http\Requests\API;

use App\Modules\Servicemanager\Models\ServiceDataCategory;
use InfyOm\Generator\Request\APIRequest;

class CreateServiceDataCategoryAPIRequest extends APIRequest
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
        return ServiceDataCategory::$rules;
    }
}
