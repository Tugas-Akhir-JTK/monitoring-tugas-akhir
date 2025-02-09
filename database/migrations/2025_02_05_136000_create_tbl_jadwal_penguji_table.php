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
        Schema::create('tbl_jadwal_penguji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('timeline_utama_id'); 
            $table->unsignedBigInteger('dospem_id');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->enum('status', ['sudah_fix', 'perlu_konfirmasi']);
            $table->timestamps();

            // foreign key
            $table->foreign('kota_id')->references('id')->on('tbl_kota')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('timeline_utama_id')->references('id')->on('tbl_timeline_utama')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('dospem_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_jadwal_penguji', function(Blueprint $table) {
            $table->dropForeign(['kota_id']);
            $table->dropForeign(['timeline_utama_id']);
            $table->dropForeign(['dospem_id']);
        });

        Schema::dropIfExists('tbl_jadwal_penguji');
    }
};
