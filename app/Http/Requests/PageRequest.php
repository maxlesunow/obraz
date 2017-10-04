<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'nullable|string|min:2|max:500',
            'text' => 'nullable|string',
            'meta_title' => 'nullable|string|min:2|max:500',
            'meta_description' => 'nullable|string|min:2|max:500',
            'meta_keywords' => 'nullable|string|min:2|max:500',
        ];
    }
}
