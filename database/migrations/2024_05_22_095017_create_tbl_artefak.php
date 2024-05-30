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
            $table->id('id_artefak');
            $table->string('nama_artefak');
            $table->string('deskripsi');
            $table->string('kategori_artefak');
            $table->timestamp('tenggat_waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_artefak');
    }
};
