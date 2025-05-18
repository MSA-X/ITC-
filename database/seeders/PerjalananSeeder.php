<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $data = [
            [
                'jenis_kendaraan' => 'mobil',
                'tanggal' => '2025-05-01',
                'jarak_km' => 15.50,
                'hasil_emisi' => 3.4521,
                'email' => 'user1@example.com',
                'sudah_ditebus' => false,
            ],
            [
                'jenis_kendaraan' => 'busway',
                'tanggal' => '2025-05-02',
                'jarak_km' => 10.25,
                'hasil_emisi' => 1.8452,
                'email' => 'user2@example.com',
                'sudah_ditebus' => true,
            ],
            [
                'jenis_kendaraan' => 'motor',
                'tanggal' => '2025-05-03',
                'jarak_km' => 8.00,
                'hasil_emisi' => 2.1300,
                'email' => 'user1@example.com',
                'sudah_ditebus' => false,
            ],
            [
                'jenis_kendaraan' => 'mobil hybrid',
                'tanggal' => '2025-05-04',
                'jarak_km' => 20.00,
                'hasil_emisi' => 1.6789,
                'email' => 'user3@example.com',
                'sudah_ditebus' => true,
            ],
        ];

        DB::table('perjalanan')->insert($data);
    }
}

