<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;

class LayoutController extends Controller
{
    public function show($halaman)
    {
        $halamanDiizinkan = [
            'pengguna',
            'hitung',
            'simulasi',
            'rekomendasi_perjalanan',
            'rekomendasi_kegiatan',
            'riwayat',
        ];

        if (!in_array($halaman, $halamanDiizinkan)) {
            abort(404);
        }

        if ($halaman === 'riwayat') {
            // Kalau mau data perjalanan sesuai user login, ganti Perjalanan::all() dengan query berdasarkan user
            $perjalanan = Perjalanan::all();
            return view("pengguna.$halaman", compact('perjalanan'));
        }

        return view("pengguna.$halaman");
    }

}
