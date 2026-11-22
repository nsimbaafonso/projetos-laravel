<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FatorialController;

Route::get("/", [FatorialController::class, "index"])->name("fatorial.index");
Route::post("/calc-fatorial", [FatorialController::class, "calcFatorial"])->name("fatorial.calc-fatorial");
