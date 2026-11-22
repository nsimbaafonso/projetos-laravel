<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SegundoGrauRequest extends FormRequest
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
            "a" => "required|numeric|max:100",
            "b" => "required|numeric|max:100",
            "c" => "required|numeric|max:100",
        ];
    }
    public function messages(): array
    {
        return [
            "a.required" => "O valor de :attribute é obrigatório",
            "a.numeric" => "O valor de :attribute deve ser um número",
            "a.max" => "O valor de :attribute deve ser no máximo 100",
            "b.required" => "O valor de :attribute é obrigatório",
            "b.numeric" => "O valor de :attribute deve ser um número",
            "b.max" => "O valor de :attribute deve ser no máximo 100",
            "c.required" => "O valor de :attribute é obrigatório",
            "c.numeric" => "O valor de :attribute deve ser um número",
            "c.max" => "O valor de :attribute deve ser no máximo 100",
        ];
    }
}
