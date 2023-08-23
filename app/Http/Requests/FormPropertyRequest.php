<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'title' => ['required','min:8'],
            'description' => ['required','min:4'],
            'surface' => ['required','integer', 'min:0'],
            'rooms' => ['required','integer','min:0'],
            'bedrooms' => ['required','integer','min:0'],
            'floor' => ['required','integer','min:0'],
            'price' => ['required','integer','min:0'],
            'city' => ['required','min:4'],
            'address' => ['required','min:4'],
            'postal' => ['required','min:0'],
            'sold' => ['boolean'],
            'options' => ['array','exists:options,id'],
            'images' => ['array']
        ];
    }
}
