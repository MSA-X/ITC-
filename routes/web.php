<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayoutController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/signup', [AuthController::class, 'signupPage'])->name('signup');
Route::get('/hitung_gklogin', [HomeController::class, 'hitung_gklogin'])->name('hitung_gklogin');
Route::get('/{halaman}', [LayoutController::class, 'show']);