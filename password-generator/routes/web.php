<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordGeneratorController;

Route::get("/", [PasswordGeneratorController::class, "index"])->name("password.index");
Route::post("/password-generate", [PasswordGeneratorController::class, "passwordGenerate"])->name("password.generate");
