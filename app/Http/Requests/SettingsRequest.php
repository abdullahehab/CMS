<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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

//        ['blog_name', 'phone_number', 'blog_email', 'address'];

        return [
            'blog_name' => ['required', 'string'],
            'phone_number' => ['required'],
            'blog_email' => ['required', 'email'],
            'address' => ['required']
        ];
    }
}
