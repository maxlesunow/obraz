<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerRequest extends FormRequest
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
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'middle_name' => 'string|nullable',
            'description' => 'string|nullable',
            'meta_title' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'meta_url' => 'string|nullable',
        ];
    }
}
