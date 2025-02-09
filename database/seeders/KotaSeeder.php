<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KotaModel;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KotaModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => 1,
            'anggota1_id' => 7,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '101',
            'judul_tugas_akhir' => 'PENGEMBANGAN APLIKASI MONITORING TUGAS AKHIR DI JURUSAN TEKNIK KOMPUTER DAN INFORMATIKA',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'HKI',
            'mitra_tugas_akhir' => 'industri',
        ]);

        KotaModel::create([
            'periode_id' => 2,
            'timeline_utama_id' => 1,
            'anggota1_id' => 7,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => 8,
            'dospem2_id' => 9,
            'nama_kota' => '102',
            'judul_tugas_akhir' => 'PEMANFAATAN TELEMEDICINE LAYANAN INFORMASI INTERAKTIF BERBASIS CHATBOT DAN LAYANAN RESERVASI ANTRIAN PASIEN',
            'metodologi_tugas_akhir' => 'waterfall',
            'luaran_tugas_akhir' => 'Jurnal',
            'mitra_tugas_akhir' => 'non-mitra',
        ]);

        KotaModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => null,
            'anggota1_id' => 5,
            'anggota2_id' => 6,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '201',
            'judul_tugas_akhir' => 'PENGEMBANGAN APLIKASI AUDIT MUTU INTERNAL BERBASIS WEBSITE SPMI POLBAN',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'HKI',
            'mitra_tugas_akhir' => 'organisasi',
        ]);

        KotaModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => null,
            'anggota1_id' => 7,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '208',
            'judul_tugas_akhir' => 'RANCANG BANGUN SISTEM ANALISIS KOMPUTASI SCORE INHEREN PADA IDENTIFIKASI RESIKO DI SPI POLBAN',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'HKI',
            'mitra_tugas_akhir' => 'industri',
        ]);

        KotaModel::create([
            'periode_id' => 1,
            'timeline_utama_id' => null,
            'anggota1_id' => 6,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '204',
            'judul_tugas_akhir' => 'RANCANG BANGUN APLIKASI PEMANTAUAN CUACA REALTIME',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'HKI',
            'mitra_tugas_akhir' => 'non-mitra',
        ]);

        KotaModel::create([
            'periode_id' => 1,
            'timeline_utama_id' => null,
            'anggota1_id' => 5,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '302',
            'judul_tugas_akhir' => 'PENGEMBANGAN SISTEM INFORMASI AKADEMIK BERBASIS WEB',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'Jurnal',
            'mitra_tugas_akhir' => 'organisasi',
        ]);

        KotaModel::create([
            'periode_id' => 2,
            'timeline_utama_id' => null,
            'anggota1_id' => 7,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '401',
            'judul_tugas_akhir' => 'PENGEMBANGAN SISTEM E-COMMERCE UNTUK PENJUALAN PRODUK LOKAL',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'HKI',
            'mitra_tugas_akhir' => 'industri',
        ]);

        KotaModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => null,
            'anggota1_id' => 7,
            'anggota2_id' => null,
            'anggota3_id' => null,
            'dospem1_id' => null,
            'dospem2_id' => null,
            'nama_kota' => '201',
            'judul_tugas_akhir' => 'PENGEMBANGAN APLIKASI WEB UNTUK REKOMENDASI PEMBELAJARAN ONLINE MENGGUNAKAN METODE HYBRID FILTERING',
            'metodologi_tugas_akhir' => null,
            'luaran_tugas_akhir' => 'UAT',
            'mitra_tugas_akhir' => 'organisasi',
        ]);
        
    }
}
