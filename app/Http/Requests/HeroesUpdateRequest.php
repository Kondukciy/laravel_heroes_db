<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroesUpdateRequest extends FormRequest
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
        return [
            'nickname'           => 'string|min:1|max:50',
            'real_name'          => 'string|min:1|max:50',
            'origin_description' => 'string|min:5|max:500',
            'superpowers'        => 'string|min:1|max:300',
            'catch_phrase'        => 'string|min:1|max:250',
        ];
    }
}
