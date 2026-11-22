<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorGeneratorController;

Route::get("/", [ColorGeneratorController::class, "index"])->name("generator.index");
Route::post("/", [ColorGeneratorController::class, "generateColor"])->name("generator.generator-color");
