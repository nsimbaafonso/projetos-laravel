<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchImagesController;

Route::get("/", [SearchImagesController::class, "index"])->name("images.index");
Route::post("/search-images", [SearchImagesController::class, "SearchImages"])->name("images.search");
