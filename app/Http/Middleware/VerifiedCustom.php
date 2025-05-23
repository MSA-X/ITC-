<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedCustom
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (!Auth::user()->email_verified_at) {
            return redirect('/verify')->with('message', 'Silakan verifikasi email terlebih dahulu.');
        }

        return $next($request);
    }
}
