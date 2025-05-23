<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
{
    Session::flash('email', $request->email);
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ], [
        'email.required' => 'Email Wajib Diisi',
        'password.required' => 'Password Wajib Diisi',
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password
    ];
    if (Auth::attempt($infologin)) {
        session(['nama' => Auth::user()->nama]);
        return redirect('/pengguna');
    } else {
        return redirect('/login')->withErrors('Email dan password dimasukkan tidak valid');
    }
}
}
