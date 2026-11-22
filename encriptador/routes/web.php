<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncriptadorController;

Route::get("/", [EncriptadorController::class, "index"])->name("encriptador.index");
Route::post("/encriptar", [EncriptadorController::class, "encriptar"])->name("encriptador.encriptar");
