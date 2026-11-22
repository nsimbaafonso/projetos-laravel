<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PasswordGeneratorRequest extends FormRequest
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
            "tamanho" => "required|integer|between:8,100",
            "maiusculas" => "nullable|boolean",
            "minusculas" => "nullable|boolean",
            "numeros" => "nullable|boolean",
            "simbolos" => "nullable|boolean",
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {

            if (
                !$this->boolean("maiusculas") &&
                !$this->boolean("minusculas") &&
                !$this->boolean("numeros") &&
                !$this->boolean("simbolos")
            ) {
                $validator->errors()->add(
                    "opcoes",
                    "Selecione pelo menos uma opção para gerar a senha."
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            "tamanho.required" => "É obrigatório informar o tamanho da senha",
            "tamanho.integer" => "O tamanho deve ser um número inteiro e positivo",
            "tamanho.between" => "O tamanho deve ser entre 8 e 100",

            "maiusculas.boolean" => "A opção de maiúsculas é inválida",
            "minusculas.boolean" => "A opção de minúsculas é inválida",
            "numeros.boolean" => "A opção de números é inválida",
            "simbolos.boolean" => "A opção de símbolos é inválida",
        ];
    }
}
