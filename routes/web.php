<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Pakai controller, bukan function langsung
Route::get('/', [HomeController::class, 'index']);
