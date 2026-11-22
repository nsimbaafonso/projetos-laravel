<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FatorialRequest extends FormRequest
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
            "fatorial" => "required|integer|between:0,100",
        ];
    }

    public function messages(): array
    {
        return [
            "fatorial.required" => "É obrigatório informar o valor",
            "fatorial.integer" => "O valor deve ser inteiro e positivo",
            "fatorial.between" => "O valor deve estar entre 1 e 100",
        ]; 
    }
}
