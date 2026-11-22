<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            "titulo" => "required|string|min:3|max:255",
            "descricao" => "required|string|min:30",
            "status" => "required|in:pendente,em_andamento,concluida",
            "prioridade" => "required|in:baixa,media,alta",
            "data_limite" => "required|date",
        ];
    }
    public function messages(): array
    {
        return [
            "titulo.required" => "O título da tarefa é obrigatório.",
            "titulo.string" => "O título deve conter apenas texto.",
            "titulo.min" => "O título deve ter pelo menos 3 caracteres.",
            "titulo.max" => "O título não pode ultrapassar 255 caracteres.",

            "descricao.required" => "A descrição da tarefa é obrigatória.",
            "descricao.string" => "A descrição deve conter apenas texto.",
            "descricao.min" => "A descrição deve ter pelo menos 30 caracteres.",

            "status.required" => "O status da tarefa é obrigatório.",
            "status.in" => "O status selecionado é inválido.",

            "prioridade.required" => "A prioridade da tarefa é obrigatória.",
            "prioridade.in" => "A prioridade selecionada é inválida.",

            "data_limite.required" => "A data limite é obrigatória.",
            "data_limite.date" => "Informe uma data válida.",
        ];
    }
}
