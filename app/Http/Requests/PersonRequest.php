<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|max:255|min:3",
            "last_name" => "required|max:255|min:3",
            "age" => "required|numeric|min:0|max:150",
            "sex"=> "required|max:255|min:3",
            "email"=> "required|email|unique:people,email",

        ];
    }
}
