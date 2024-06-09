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
        $judulList = [
            'PENGEMBANGAN APLIKASI MONITORING TUGAS AKHIR DI JURUSAN TEKNIK KOMPUTER DAN INFORMATIKA',
            'PEMANFAATAN TELEMEDICINE LAYANAN INFORMASI INTERAKTIF BERBASIS CHATBOT DAN LAYANAN RESERVASI ANTRIAN PASIEN',
            'PENGEMBANGAN APLIKASI AUDIT MUTU INTERNAL BERBASIS WEBSITE SPMI POLBAN',
            'PENGEMBANGAN APLIKASI PENGUKURAN CAPAIAN PEMBELAJARAN BERBASIS WEB DENGAN MENGGUNAKAN METODE GRAPH',
            'RANCANG BANGUN SISTEM ANALISIS KOMPUTASI SCORE INHEREN PADA IDENTIFIKASI RESIKO DI SPI POLBAN',
            'PENGEMBANGAN APLIKASI WEB UNTUK REKOMENDASI PEMBELAJARAN ONLINE MENGGUNAKAN METODE HYBRID FILTERING',
            'PENGEMBANGAN SISTEM INFORMASI MANAJEMEN LABORATORIUM',
            'PENGEMBANGAN SISTEM E-COMMERCE UNTUK PENJUALAN PRODUK LOKAL',
            'RANCANG BANGUN APLIKASI PEMANTAUAN CUACA REALTIME',
            'PENGEMBANGAN SISTEM INFORMASI AKADEMIK BERBASIS WEB'
        ];

        $classes = [
            '1' => 101, //Angka 1 mewakili kelas D3-A
            '2' => 201, //Angka 2 mewakili kelas D3-B
            '3' => 301, //Angka 3 mewakili kelas D4-A
            '4' => 401, //Angka 4 mewakili kelas D4-B
        ];

        foreach ($classes as $class => $startId) {
            for ($i = 0; $i < 10; $i++) {
                KotaModel::create([
                    'nama_kota' => $startId + $i,
                    'judul' => $judulList[$i % count($judulList)],
                    'kelas' => $class,
                    'periode' => 2024,
                ]);
            }
        }
    }
}
