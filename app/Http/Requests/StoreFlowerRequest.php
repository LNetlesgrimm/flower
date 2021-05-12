<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlowerRequest extends FormRequest
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
            'name' => 'required|alpha|max:30',
            'price' => 'required|numeric|between:2,100'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'A name is required.',
            'name.max' => 'Name should have max 30 characters.',
            'price.between' => 'Price should be between 2 and 100.',
            'poster.mimes' => 'File extension should be pdf, csv or jpg',
            'poster.max' => 'Max size is 2048.'
        ];
    }
}
