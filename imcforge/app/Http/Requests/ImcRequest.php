<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ImcRequest extends FormRequest
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
            "name" => "required|min:3|max:100",
            "peso" => "required|numeric|min:1",
            "altura" => "required|numeric|min:0.5|max:3",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "O nome é obrigatório.",
            "name.min" => "O nome deve possuir pelo menos :min caracteres.",
            "name.max" => "O nome pode possuir no máximo :max caracteres.",

            "peso.required" => "O peso é obrigatório.",
            "peso.numeric" => "O peso deve ser um número.",
            "peso.min" => "O peso deve ser maior que :min kg.",

            "altura.required" => "A altura é obrigatória.",
            "altura.numeric" => "A altura deve ser um número.",
            "altura.min" => "A altura mínima é :min metro.",
            "altura.max" => "A altura máxima é :max metros.",
        ];
    }
}
