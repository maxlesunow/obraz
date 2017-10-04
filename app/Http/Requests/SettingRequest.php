<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

            'phone' => 'nullable|string|min:2|max:500',
            'address' => 'nullable|string|min:2|max:500',
            'email' => 'nullable|string|min:2|max:500',
            'vk_url' => 'nullable|string|min:2|max:500',
            'fb_url' => 'nullable|string|min:2|max:500',
            'ok_url' => 'nullable|string|min:2|max:500',
            'instagram_url' => 'nullable|string|min:2|max:500',
            'twitter_url' => 'nullable|string|min:2|max:500',
        ];
    }
}
