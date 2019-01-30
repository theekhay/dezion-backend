<?php

namespace App\Modules\Admin\Http\Requests\API;

use App\Modules\Admin\Models\Administrator;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Support\Facades\Auth;

class CreateAdministratorAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $admin = Auth::user();

        // if( $admin->isBranchAdmin() ){
        //     return false;
        // }

        // if( $admin->church_id != $this->church_id){
        //     return false;
        // }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Administrator::$rules;
    }
}
