<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_jadwal_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_label');
            $table->string('nama_kegiatan');
            $table->string('bulan');
            $table->string('minggu');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jadwal_kegiatan');
    }
};
