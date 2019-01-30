<?php

namespace App\Modules\ministry\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\ministry\Models\Cell;

class UpdateCellRequest extends FormRequest
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
        return Cell::$rules;
    }
}
