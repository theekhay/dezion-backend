<?php

namespace App\Modules\ministry\Http\Requests\API;

use App\Modules\ministry\Models\Cell;
use InfyOm\Generator\Request\APIRequest;

class UpdateCellAPIRequest extends APIRequest
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
        return Cell::$rules;
    }
}
