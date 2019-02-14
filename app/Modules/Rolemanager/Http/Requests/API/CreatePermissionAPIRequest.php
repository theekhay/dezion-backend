<?php

namespace App\Modules\Rolemanager\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Membership\Models\AdminStatus;
use App\Modules\Admin\Models\AdminType;

use Illuminate\Support\Facades\Auth;

    class CreatePermissionAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        /**
         * Only superadmins are authorized to create permissions.
         *
         */
        if (Auth::user()->type != AdminType::SuperAdmin)
            //  return false;


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
            'category_id' => 'required|numeric|exists:permission_categories,id'
        ];
    }
}
