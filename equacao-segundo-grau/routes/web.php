<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SegundoGrauController;

Route::get("/", [SegundoGrauController::class, "index"])->name("segundo.index");
Route::post("/calculo-segundo-grau", [SegundoGrauController::class, "calculoSegundo"])->name("segundo.calculo");
