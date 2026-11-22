<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Tarefa;
use Exception;

class TodoController extends Controller
{
    //index
    public function index()
    {
        $tarefas = Tarefa::all();

        return view("tarefas.index", compact("tarefas"));
    }

    //form de cadastro
    public function create()
    {
        return view("tarefas.create");
    }

    //form de cadastro
    public function store(TodoRequest $request)
    {
        try {
            $dados = $request->validated();
            Tarefa::create($dados);

            return redirect()
            ->route("tarefas.index")
            ->with("success", "Tarefa criada com sucesso");
        } catch (Exception $e) {
            return back()
            ->withInput()
            ->with("error", "Não foi possível cadastrar a tarefa");
        }
    }

    //visualizar um registro
    public function show(Tarefa $tarefa)
    {
        return view("tarefas.show", compact("tarefa"));
    }

    //form de edição
    public function edit(Tarefa $tarefa)
    {
        return view("tarefas.edit", compact("tarefa"));
    }

    //atualizar dados no banco
    public function update(TodoRequest $request, Tarefa $tarefa)
    {
        try {
            $tarefa->update($request->validated());

            return redirect()
            ->route("tarefas.show", $tarefa)
            ->with("success", "Tarefa atualizado com sucesso.");
        } catch (Exception $e) {
            return redirect()
            ->back()
            ->withInput()
            ->with("error", "Não foi possível atualizar a tarefa.");
        }
    }

    //tela de eliminar dado
    public function delete(Tarefa $tarefa)
    {
        return view("tarefas.delete", compact("tarefa"));
    }

    //elimina dados
    public function destroy(Tarefa $tarefa)
    {
        try {

            $tarefa->delete();

            return redirect()
                ->route("tarefas.index")
                ->with("success", "Tarefa excluída com sucesso.");

        } catch (Exception $e) {

            return redirect()
                ->back()
                ->with("error", "Não foi possível excluir a tarefa.");
        }
    }
}
