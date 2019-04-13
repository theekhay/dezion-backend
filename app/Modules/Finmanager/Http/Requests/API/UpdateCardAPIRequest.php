<?php

namespace App\Modules\finmanager\Http\Requests\API;

use App\Modules\finmanager\Models\Card;
use InfyOm\Generator\Request\APIRequest;

class UpdateCardAPIRequest extends APIRequest
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
        return Card::$rules;
    }
}
