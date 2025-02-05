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
            $table->id();
            $table->unsignedBigInteger('periode_id');
            $table->unsignedBigInteger('anggota1_id');
            $table->unsignedBigInteger('anggota2_id')->nullable()->default(null);
            $table->unsignedBigInteger('anggota3_id')->nullable()->default(null);
            $table->unsignedBigInteger('dospem1_id')->nullable()->default(null);
            $table->unsignedBigInteger('dospem2_id')->nullable()->default(null);
            $table->string('nama_kota',50);
            $table->string('judul_tugas_akhir');
            $table->string('metodologi_tugas_akhir',50)->nullable()->default(null);
            $table->enum('luaran_tugas_akhir',['HKI', 'Jurnal', 'UAT']);
            $table->enum('mitra_tugas_akhir',['non-mitra', 'organisasi', 'industri']);
            $table->timestamps();

            // foreign key
            $table->foreign('periode_id')->references('id')->on('tbl_periode')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('anggota1_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('anggota2_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('anggota3_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('dospem1_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('dospem2_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_kota', function(Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropForeign(['anggota1_id']);
            $table->dropForeign(['anggota2_id']);
            $table->dropForeign(['anggota3_id']);
            $table->dropForeign(['dospem1_id']);
            $table->dropForeign(['dospem2_id']);
        });

        Schema::dropIfExists('tbl_kota');
    }
};
