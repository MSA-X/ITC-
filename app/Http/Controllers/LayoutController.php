<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function show($halaman)
    {
        $halamanDiizinkan = [
            'pengguna',
            'hitung',
            'simulasi',
            'rekomendasi',
            'riwayat',
        ];

        if (in_array($halaman, $halamanDiizinkan)) {
            return view("pengguna.$halaman");
        } else {
            abort(404);
        }
    }
}
