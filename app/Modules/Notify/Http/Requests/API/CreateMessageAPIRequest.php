<?php

namespace App\Modules\Notify\Http\Requests\API;

use App\Modules\Notify\Models\Message;
use InfyOm\Generator\Request\APIRequest;

class CreateMessageAPIRequest extends APIRequest
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
        return Message::$rules;
    }
}
