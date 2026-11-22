<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ColorGeneratorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "r" => "required|numeric|min:0|max:255",
            "g" => "required|numeric|min:0|max:255",
            "b" => "required|numeric|min:0|max:255",
        ];
    }

    public function messages(): array 
    {
        return [
            "r.required" => "O valor de :attribute é obrigatório",
            "r.numeric" => "O valor de :attribute deve ser um número",
            "r.min" => "O valor mínimo de :attribute deve ser 0",
            "r.max" => "O valor máximo de :attribute deve 255",
            "g.required" => "O valor de :attribute é obrigatório",
            "g.numeric" => "O valor de :attribute deve ser um número",
            "g.min" => "O valor mínimo de :attribute deve ser 0",
            "g.max" => "O valor máximo de :attribute deve 255",
            "b.required" => "O valor de :attribute é obrigatório",
            "b.numeric" => "O valor de :attribute deve ser um número",
            "b.min" => "O valor mínimo de :attribute deve ser 0",
            "b.max" => "O valor máximo de :attribute deve 255",
        ];
    }
}
