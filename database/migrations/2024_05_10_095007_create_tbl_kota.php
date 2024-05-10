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
        Schema::create('tbl_kota', function (Blueprint $table) {
            $table->integer('id_kota')->unique();
            $table->string('judul');
            $table->string('nama_mahasiswa');
            $table->string('pembimbing_satu');
            $table->string('pembimbing_dua');
            $table->string('kelas');
            $table->string('periode');
            $table->integer('jumlah_bimbingan');
            $table->integer('jumlah_artefak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kota');
    }
};
