<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // Kalau mau, bisa tambahkan route yang dikecualikan dari CSRF di sini:
    // protected $except = [
    //     'route/yang/ingin/dikecualikan',
    // ];
}
