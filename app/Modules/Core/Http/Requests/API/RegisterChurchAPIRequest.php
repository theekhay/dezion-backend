<?php

namespace App\Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterChurchAPIRequest extends FormRequest
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
        return [
            'church_name' => 'required|string|unique:churches,name',
            // 'telephone' => 'required|numeric|unique_with:administrators,church_id',
            // 'email' => 'required|email|unique_with:administrators,church_id',

            'telephone' => 'required|string',
            'email' => 'required|email',

            'username' => 'alpha_num|unique_with:administrators,church_id',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }
}
