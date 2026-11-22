<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaudarController;

Route::get("/", [SaudarController::class, "index"])->name("saudar.index");
