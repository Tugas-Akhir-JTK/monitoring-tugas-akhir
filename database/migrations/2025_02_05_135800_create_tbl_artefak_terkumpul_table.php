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
        Schema::create('tbl_artefak_terkumpul', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artefak_id');
            $table->unsignedBigInteger('kota_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->dateTime('tanggal_pengumpulan');
            $table->enum('status_pengumpulan', ['terlambat', 'tepat_waktu']);
            $table->timestamps();

            // foreign key
            $table->foreign('artefak_id')->references('id')->on('tbl_artefak')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kota_id')->references('id')->on('tbl_kota')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_artefak_terkumpul', function(Blueprint $table) {
            $table->dropForeign(['artefak_id']);
            $table->dropForeign(['kota_id']);
        });


        Schema::dropIfExists('tbl_artefak_terkumpul');
    }
};
