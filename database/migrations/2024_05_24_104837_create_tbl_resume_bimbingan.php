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
        Schema::create('tbl_resume_bimbingan', function (Blueprint $table) {
            $table->id('id_resume_bimbingan')->unique();
            $table->date('tanggal_bimbingan');
            $table->time('waktu_bimbingan');
            $table->text('isi_resume_bimbingan');
            $table->text('isi_revisi_bimbingan')->default(null);
            $table->integer('progres_pengerjaan');
            $table->integer('tahapan_progres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_resume_bimbingan');
    }
};
