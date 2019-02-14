<?php

namespace App\Modules\ServiceManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\ServiceManager\Models\Service;

class UpdateServiceRequest extends FormRequest
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
        return Service::$rules;
    }
}
