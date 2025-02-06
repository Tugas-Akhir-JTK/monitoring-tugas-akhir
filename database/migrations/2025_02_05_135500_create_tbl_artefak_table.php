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
        Schema::create('tbl_artefak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periode_id');
            $table->unsignedBigInteger('timeline_utama_id')->nullable()->default(null);
            $table->string('nama_artefak', 100)->unique();
            $table->text('deskripsi_artefak');
            $table->string('kategori_artefak', 50);
            $table->dateTime('tenggat_waktu');
            $table->timestamps();

            // Foreign Key
            $table->foreign('periode_id')->references('id')->on('tbl_periode')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('timeline_utama_id')->references('id')->on('tbl_timeline_utama')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_artefak', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropForeign(['timeline_utama_id']);
        });

        Schema::dropIfExists('tbl_artefak');
    }
};
