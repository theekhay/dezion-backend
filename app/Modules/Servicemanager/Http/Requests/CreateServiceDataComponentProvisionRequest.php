<?php

namespace App\Modules\Servicemanager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Servicemanager\Models\ServiceDataComponentProvision;

class CreateServiceDataComponentProvisionRequest extends FormRequest
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
        return ServiceDataComponentProvision::$rules;
    }
}
