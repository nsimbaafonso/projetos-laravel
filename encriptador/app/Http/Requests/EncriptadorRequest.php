<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EncriptadorRequest extends FormRequest
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
            "texto" => "required|string",
        ];
    }

    public function messages(): array
    {
        return [
            "texto.required" => "Informe o texto a ser encriptado",
            "texto.string" => "O texto a ser encriptado deve ser um conjunto de caracteres",
        ];
    }
}
