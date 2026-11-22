<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get("/", [WeatherController::class, "index"])->name("weather.index");
Route::post("/weather-search", [WeatherController::class, "SearchWeather"])->name("weather.search");
