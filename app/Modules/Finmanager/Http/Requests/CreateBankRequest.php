<?php

namespace App\Modules\finmanager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\finmanager\Models\Bank;

class CreateBankRequest extends FormRequest
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