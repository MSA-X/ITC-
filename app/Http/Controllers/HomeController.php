<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function hitung()
    {
        return view('hitung_gklogin');
    }

}