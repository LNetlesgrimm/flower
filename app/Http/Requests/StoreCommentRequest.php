<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'subject' => 'required|max:30',
            'message' => 'required|between:10,500'
        ];
    }

    public function messages() {
        return [
            'subject.required' => 'Subject is mandatory.',
            'message.required' => 'Message is mandatory.',
            'message.between' => 'Please enter a message between 10 and 500 characters.'
        ];
    }
}
