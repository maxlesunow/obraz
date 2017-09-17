<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'address' =>' string|nullable',
            'cost' => 'numeric|nullable',
            'time_register' =>' string|nullable',
            'time_start' =>' string|nullable',
            'description' =>' string|nullable',
            'image' =>' string|nullable',
            'meta_title' =>' string|nullable',
            'meta_description' =>' string|nullable',
            'meta_keywords' =>' string|nullable',
            'meta_url' =>' string|nullable',
        ];
    }
}
