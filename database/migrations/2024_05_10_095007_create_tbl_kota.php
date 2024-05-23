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
            $table->string('nim_satu');
            $table->string('nama_mahasiswa_satu');
            $table->string('nim_dua');
            $table->string('nama_mahasiswa_dua');
            $table->string('nim_tiga'); 
            $table->string('nama_mahasiswa_tiga');
            $table->string('nip_satu');
            $table->string('pembimbing_satu');
            $table->string('nip_dua');
            $table->string('pembimbing_dua');
            $table->string('kelas');
            $table->string('periode');
            $table->string('tahapan_progres');
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
