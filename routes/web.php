<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/signup', [AuthController::class, 'signupPage'])->name('signup');