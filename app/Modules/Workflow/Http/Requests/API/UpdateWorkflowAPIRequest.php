<?php

namespace App\Modules\Workflow\Http\Requests\API;

use App\Modules\Workflow\Models\Workflow;
use InfyOm\Generator\Request\APIRequest;

class UpdateWorkflowAPIRequest extends APIRequest
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
        return Workflow::$rules;
    }
}
