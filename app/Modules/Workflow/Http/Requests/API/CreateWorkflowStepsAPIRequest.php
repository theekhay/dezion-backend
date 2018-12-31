<?php

namespace App\Modules\Workflow\Http\Requests\API;

use App\Modules\Workflow\Models\WorkflowSteps;
use InfyOm\Generator\Request\APIRequest;

class CreateWorkflowStepsAPIRequest extends APIRequest
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
        return WorkflowSteps::$rules;
    }
}