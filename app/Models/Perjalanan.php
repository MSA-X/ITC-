<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $table = 'perjalanan'; // sesuaikan nama tabel db-mu
    protected $fillable = ['jenis_kendaraan', 'tanggal', 'jarak_km', 'hasil_emisi', 'email', 'sudah_ditebus'];
}
