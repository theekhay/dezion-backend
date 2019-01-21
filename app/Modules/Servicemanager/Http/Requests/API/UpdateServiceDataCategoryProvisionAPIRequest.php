<?php

namespace App\Modules\Servicemanager\Http\Requests\API;

use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use InfyOm\Generator\Request\APIRequest;

class UpdateServiceDataCategoryProvisionAPIRequest extends APIRequest
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
        return ServiceDataCategoryProvision::$rules;
    }
}
