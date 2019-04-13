<?php

namespace App\Modules\memberlocationmapping\Http\Requests\API;

use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use InfyOm\Generator\Request\APIRequest;

class UpdateModelAddressProximityAPIRequest extends APIRequest
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
        return ModelAddressProximity::$rules;
    }
}
