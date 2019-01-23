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

            'telephone' => 'required|string|unique:churches,created_by_telephone',
            'email' => 'required|email|unique:administrators,email|unique:churches,created_by_email',

            'username' => 'alpha_num|unique_with:administrators,church_id',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ];
    }
}
