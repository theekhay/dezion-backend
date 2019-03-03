<?php

namespace App\Modules\memberlocationmapping\Http\Requests\API;

use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use InfyOm\Generator\Request\APIRequest;

class CreateModelAddressProximityAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //update this to allow only superadmin
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ModelAddressProximity::$rules;
    }
}
