<?php

namespace App\Modules\Admin\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AdminSignUpRequest extends FormRequest
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
            'firstname' => 'required|string|alpha',
            'surname' => 'required|string|alpha',
            'email' => 'required|email|unique:administrators',
            'telephone' => 'required|numeric|unique_with:administrators,church_id',
            'username' => 'nullable|alpha_dash|unique_with:administrators,church_id',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ];
    }
}
