<?php

namespace App\Modules\finmanager\Http\Requests\API;

use App\Modules\finmanager\Models\Bank;
use InfyOm\Generator\Request\APIRequest;

class UpdateBankAPIRequest extends APIRequest
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
        return Bank::$rules;
    }
}
