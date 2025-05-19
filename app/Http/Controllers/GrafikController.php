<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perjalanan;

class GrafikController extends Controller
{
    public function ambilData(Request $request)
    {
        $userEmail = $_SESSION['email'] ?? null;
        logger("Email sesi: " . $userEmail);

        $awal = $request->query('tanggal_awal');
        $akhir = $request->query('tanggal_akhir');
        logger("Rentang tanggal: $awal - $akhir");

        $data = Perjalanan::where('email', $userEmail)
            ->whereBetween('tanggal', [$awal, $akhir])
            ->orderBy('tanggal')
            ->get(['tanggal', 'hasil_emisi']);

        logger("Data diambil: " . $data->toJson());

        return response()->json($data);
    }

}
