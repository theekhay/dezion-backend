<?php

namespace App\Modules\Assimilation\Http\Requests\API;

use App\Modules\Assimilation\Models\UnAssimilatedBucket;
use InfyOm\Generator\Request\APIRequest;

class CreateUnAssimilatedBucketAPIRequest extends APIRequest
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
        return UnAssimilatedBucket::$rules;
    }
}
