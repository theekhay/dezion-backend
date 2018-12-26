<?php

namespace App\Modules\Core\Http\Requests\API;

use App\Modules\Core\Models\Church;
use InfyOm\Generator\Request\APIRequest;

class CreateChurchAPIRequest extends APIRequest
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
        return Church::$rules;
    }
}
