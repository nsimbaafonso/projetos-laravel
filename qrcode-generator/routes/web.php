<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeGeneratorController;

Route::get("/", [QrCodeGeneratorController::class, "index"])->name("qrcode.index");
Route::post("/qrcode-generator", [QrCodeGeneratorController::class, "qrCodeGenerator"])->name("qrcode.generator");
Route::get("/qrcode-download", [QrCodeGeneratorController::class, "downloadQrCode"])
    ->name("qrcode.download");
