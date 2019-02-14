<?php

namespace App\Modules\Ministry\Http\Requests\API;

use App\Modules\Ministry\Models\District;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Support\Facades\Auth;

class CreateDistrictAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $admin = Auth::user();

        if($admin->isBranchAdmin() ){

            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return District::$rules;
    }
}
