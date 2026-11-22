<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class QrCodeGeneratorRequest extends FormRequest
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
            "texto" => "required|string|max:500",
            "tamanho" => "required|integer|between:150,500",
            "cor" => "required|regex:/^#[0-9A-Fa-f]{6}$/",
        ];
    }
    public function messages(): array
    {
        return [
            "texto.required" => "Insira alguma coisa, este campo pode estar vazio",
            "texto.string" => "O campo deve ser um texto",
            "texto.max" => "O texto não pode passar :max caracteres",
            "tamanho.required" => "O tamanho é obrigatório",
            "tamanho.integer" => "O valor do tamanho deve inteiro",
            "tamanho.between" => "O tamanho deve ser entre 150 e 500",
            "cor.required" => "A cor é obrigatória",
            "cor.regex" => "A cor deve estar em formato hexadecimal válido",
        ];
    }
}
