<?php

namespace App\Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Core\Models\Church;

class UpdateChurchRequest extends FormRequest
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
        return Church::$rules;
    }
}
