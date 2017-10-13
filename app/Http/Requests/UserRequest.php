<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'middle_name' => 'string|min:2|max:255|nullable',
            'email' => 'string|max:255|email',
            'phone' => 'required|regex:/(7)[0-9]{10}/',
            'password' => 'string|min:6|confirmed|nullable',
        ];
    }
}
