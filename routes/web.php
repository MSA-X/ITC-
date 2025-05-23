<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\VerifiedCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\User;

// Halaman index
Route::get('/index', [HomeController::class, 'index']);

// Login & Logout
Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Signup
Route::get('/signup', [SignupController::class, 'signupPage'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

// Halaman verifikasi email (tampil setelah daftar, kalau belum verified)
Route::get('/verify', function () {
    return view('verify-email');  // Kamu buat file blade-nya sendiri
})->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link verifikasi telah dikirim ulang.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Link verifikasi email (dikirim via email)
Route::get('/email/verify/{id}/{hash}', function ($id, $hash, Request $request) {
    $user = User::find($id);

    if (!$user) {
        abort(404);
    }

    // Cek validasi tanda tangan link (signed URL)
    if (! URL::hasValidSignature($request)) {
        abort(403);
    }

    // Cek apakah hash cocok dengan email user
    if (! hash_equals($hash, sha1($user->email))) {
        abort(403);
    }

    // Tandai email sudah verified
    $user->email_verified_at = now();
    $user->save();

    return redirect('/login')->with('success', 'Email berhasil diverifikasi. Silakan login.');
})->name('verification.verify')->middleware('signed');

// Middleware custom untuk cek login dan verifikasi email
    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pengguna', [UsersController::class, 'index'])->name('pengguna');});


// Route yang tidak perlu login atau verifikasi
Route::get('/hitung_gklogin', [HomeController::class, 'hitung_gklogin'])->name('hitung_gklogin');
Route::get('/{halaman}', [LayoutController::class, 'show']);
Route::get('/grafik-data', [GrafikController::class, 'ambilData']);
