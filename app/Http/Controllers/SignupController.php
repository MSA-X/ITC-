<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class SignupController extends Controller
{
    function signupPage()
    {
        return view('signup'); 
    }

    function signup(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan Masukkan Email yang benar',
            'email.unique' => 'Email sudah pernah digunakan, silahkan gunakan email yang lain',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Minimum Password yang diijinkan adalah 6 karakter',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
        return redirect('/verify')->with('message', 'Link verifikasi telah dikirim ke email kamu.');
    }
}
