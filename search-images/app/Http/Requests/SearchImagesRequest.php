<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchImagesRequest extends FormRequest
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
            "pesquisa" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "pesquisa.required" => "A pesquisa não deve estar vazia",
            "pesquisa.string" => "Insira caracteres ou conjunto de caracteres para pesquisar"
        ];
    }
}
