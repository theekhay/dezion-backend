<?php

namespace App\Modules\Core\Http\Requests\API;

use App\Modules\Core\Models\Branch;
use InfyOm\Generator\Request\APIRequest;

use Illuminate\Support\Facades\Auth;
use App\Modules\Membership\Models\AdminType;

class CreateBranchAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        return Auth::user()->type != AdminType::BranchAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Branch::$rules;
    }
}
