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
        Schema::create('tbl_timeline_kota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('timeline_utama_id');
            $table->string('nama_timeline',100);
            $table->enum('status', ['selesai', 'belum_selesai'])->default('belum_selesai');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            // foreign key
            $table->foreign('kota_id')->references('id')->on('tbl_kota')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('timeline_utama_id')->references('id')->on('tbl_timeline_utama')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_timeline_kota', function(Blueprint $table) {
            $table->dropForeign(['kota_id']);
            $table->dropForeign(['timeline_utama_id']);
        });

        Schema::dropIfExists('tbl_timeline_kota');
    }
};
