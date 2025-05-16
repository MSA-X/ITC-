<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function hitung_gklogin()
    {
        return view('hitung_gklogin');
    }

}