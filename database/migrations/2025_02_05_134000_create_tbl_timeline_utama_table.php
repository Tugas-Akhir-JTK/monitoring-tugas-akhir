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
        Schema::create('tbl_timeline_utama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periode_id');
            $table->string('nama_timeline',100);
            $table->text('deskripsi_timeline');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            // foreign key
            $table->foreign('periode_id')->references('id')->on('tbl_periode')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_timeline_utama', function(Blueprint $table) {
            $table->dropForeign(['periode_id']);
        });

        Schema::dropIfExists('tbl_timeline_utama');
    }
};
