<?php

namespace App\Modules\ServiceManager\Http\Requests\API;

use App\Modules\ServiceManager\Models\Service;
use InfyOm\Generator\Request\APIRequest;

class UpdateServiceAPIRequest extends APIRequest
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
        return Service::$rules;
    }
}
