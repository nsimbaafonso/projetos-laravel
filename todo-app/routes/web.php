<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get("/", [TodoController::class, "index"])->name("tarefas.index");
Route::get("/criar-tarefa", [TodoController::class, "create"])->name("tarefas.create");
Route::post("/armazenar-tarefa", [TodoController::class, "store"])->name("tarefas.store");
Route::get("/visualizar/{tarefa}", [TodoController::class, "show"])->name("tarefas.show");
Route::get("/editar-tarefa/{tarefa}", [TodoController::class, "edit"])->name("tarefas.edit");
Route::put("/atualizar-tarefa/{tarefa}", [TodoController::class, "update"])->name("tarefas.update");
Route::put("/atualizar-tarefa/{tarefa}", [TodoController::class, "update"])->name("tarefas.update");
Route::get("/deletar-tarefa/{tarefa}", [TodoController::class, "delete"])->name("tarefas.delete");
Route::delete("/excluir-tarefa/{tarefa}", [TodoController::class, "destroy"])->name("tarefas.destroy");
