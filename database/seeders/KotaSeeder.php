<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KotaModel;
use Illuminate\Support\Facades\Hash;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KotaModel::create([
            'nama_kota' => 206,
            'judul' => 'PENGEMBANGAN APLIKASI MONITORING TUGAS AKHIR DI JURUSAN TEKNIK KOMPUTER DAN INFORMATIKA',
            'kelas' => 'D3-3B',
            'periode' => 2024,
        ]);

        KotaModel::create([
            'nama_kota' => 205,
            'judul' => 'PEMANFAATAN TELEMEDICINE LAYANAN INFORMASI INTERAKTIF BERBASIS CHATBOT DAN LAYANAN RESERVASI ANTRIAN PASIEN',
            'kelas' => 'D3-3B',
            'periode' => 2024,
        ]);

        KotaModel::create([
            'nama_kota' => 204,
            'judul' => 'PENGEMBANGAN APLIKASI AUDIT MUTU INTERNAL BERBASIS WEBSITE SPMI POLBAN',
            'kelas' => 'D3-3B',
            'periode' => 2024,
        ]);

        KotaModel::create([
            'nama_kota' => 101,
            'judul' => 'PENGEMBANGAN APLIKASI PENGUKURAN CAPAIAN PEMBELAJARAN BERBASIS WEB DENGAN MENGGUNAKAN METODE GRAPH',
            'kelas' => 'D3-3A',
            'periode' => 2024,
        ]);

        KotaModel::create([
            'nama_kota' => 102,
            'judul' => 'RANCANG BANGUN SISTEM ANALISIS KOMPUTASI SCORE INHEREN PADA IDENTIFIKASI RESIKO DI SPI POLBAN',
            'kelas' => 'D3-3A',
            'periode' => 2024,
        ]);

        KotaModel::create([
            'nama_kota' => 103,
            'judul' => 'PENGEMBANGAN APLIKASI WEB UNTUK REKOMENDASI PEMBELAJARAN ONLINE MENGGUNAKAN METODE HYBRID FILTERING',
            'kelas' => 'D3-3A',
            'periode' => 2024,
        ]);
    }
}
