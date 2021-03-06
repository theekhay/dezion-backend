<?php

namespace App\Modules\Assimilation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Assimilation\Models\UnAssimilatedBucket;

class CreateUnAssimilatedBucketRequest extends FormRequest
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
