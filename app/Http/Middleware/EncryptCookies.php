<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Daftar cookie yang tidak akan dienkripsi.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
