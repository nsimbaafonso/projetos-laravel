<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;

Route::get("/", [ImcController::class, "index"])->name("imc.index");
Route::post("/imc-calc", [ImcController::class, "imcCalc"])->name("imc.calc");
