<?php

namespace App\Modules\Membership\Http\Requests\API;

use App\Modules\Membership\Models\CellMemberMapping;
use InfyOm\Generator\Request\APIRequest;

class UpdateCellMemberMappingAPIRequest extends APIRequest
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
        return CellMemberMapping::$rules;
    }
}