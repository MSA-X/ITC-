<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('perjalanan', function (Blueprint $table) {
            $table->id('id_perjalanan'); // Primary Key, Auto Increment
            $table->enum('jenis_kendaraan', ['mobil', 'busway', 'motor', 'mobil hybrid']);
            $table->date('tanggal');
            $table->decimal('jarak_km', 10, 2);
            $table->decimal('hasil_emisi', 10, 4)->nullable(); // Nullable sesuai struktur kamu
            $table->string('email', 255);
            $table->boolean('sudah_ditebus')->default(false);

            $table->index('email'); // Index seperti yang kamu tulis
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perjalanan');
    }
};
