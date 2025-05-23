<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        // Ambil data pengguna dari session atau langsung dari Auth
        $nama = session('name', Auth::user()->name); // Sesuaikan dengan kolom nama

        // Kirim data nama ke view
        return view('pengguna.pengguna', ['nama' => $nama]);
    }
}
