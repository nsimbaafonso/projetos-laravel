<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WeatherRequest extends FormRequest
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
            "localidade" => "required|string"
        ];
    }
    public function messages(): array
    {
        return [
            "localidade.required" => "A pesquisa por localidade não deve estar vazia",
            "localidade.string" => "Insira caracters ou conjunto de caracteres para buscar o tempo",
        ];
    }
}
