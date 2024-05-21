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
            'id_kota' => 206,
            'judul' => 'PENGEMBANGAN APLIKASI MONITORING TUGAS AKHIR DI JURUSAN TEKNIK KOMPUTER DAN INFORMATIKA',
            'nim_satu' => '211511016',
            'nama_mahasiswa_satu' => 'Ibrahim Kevin',
            'nim_dua' => '211511048',
            'nama_mahasiswa_dua' => 'Muhammad Rivan',
            'nim_tiga' => '211511060',
            'nama_mahasiswa_tiga' => 'Syahrul Abdillah',
            'nip_satu' => '1993017',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993018',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3B',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);

        KotaModel::create([
            'id_kota' => 205,
            'judul' => 'PEMANFAATAN TELEMEDICINE LAYANAN INFORMASI INTERAKTIF BERBASIS CHATBOT DAN LAYANAN RESERVASI ANTRIAN PASIEN',
            'nim_satu' => '211511034',
            'nama_mahasiswa_satu' => 'Bagus Nugroho',
            'nim_dua' => '211511051',
            'nama_mahasiswa_dua' => 'Nazwa Fitriyani',
            'nim_tiga' => '211511054',
            'nama_mahasiswa_tiga' => 'Reyna Nur',
            'nip_satu' => '1993011',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993012',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3B',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);

        KotaModel::create([
            'id_kota' => 204,
            'judul' => 'PENGEMBANGAN APLIKASI AUDIT MUTU INTERNAL BERBASIS WEBSITE SPMI POLBAN',
            'nim_satu' => '211511040',
            'nama_mahasiswa_satu' => 'Jeremia Haposan',
            'nim_dua' => '211511055',
            'nama_mahasiswa_dua' => 'Rezky Azhar',
            'nim_tiga' => '211511061',
            'nama_mahasiswa_tiga' => 'Tubagus Aji',
            'nip_satu' => '1993013',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993014',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3B',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);

        KotaModel::create([
            'id_kota' => 101,
            'judul' => 'PENGEMBANGAN APLIKASI PENGUKURAN CAPAIAN PEMBELAJARAN BERBASIS WEB DENGAN MENGGUNAKAN METODE GRAPH',
            'nim_satu' => '211511003',
            'nama_mahasiswa_satu' => 'Aldrin Rayhan',
            'nim_dua' => '211511004',
            'nama_mahasiswa_dua' => 'Ananta Destawardhana',
            'nim_tiga' => '211511020',
            'nama_mahasiswa_tiga' => 'Muhammad Fathur',
            'nip_satu' => '1993015',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993016',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3A',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);

        KotaModel::create([
            'id_kota' => 102,
            'judul' => 'RANCANG BANGUN SISTEM ANALISIS KOMPUTASI SCORE INHEREN PADA IDENTIFIKASI RESIKO DI SPI POLBAN',
            'nim_satu' => '211511001',
            'nama_mahasiswa_satu' => 'Achmadya Ridwan',
            'nim_dua' => '211511007',
            'nama_mahasiswa_dua' => 'Ari Maulana',
            'nim_tiga' => '211511032',
            'nama_mahasiswa_tiga' => 'Wildan Setya',
            'nip_satu' => '1993019',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993020',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3A',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);

        KotaModel::create([
            'id_kota' => 103,
            'judul' => 'PENGEMBANGAN APLIKASI WEB UNTUK REKOMENDASI PEMBELAJARAN ONLINE MENGGUNAKAN METODE HYBRID FILTERING',
            'nim_satu' => '211511015',
            'nama_mahasiswa_satu' => 'Hilman Permana',
            'nim_dua' => '211511009',
            'nama_mahasiswa_dua' => 'Arief Rahman',
            'nim_tiga' => '211511018',
            'nama_mahasiswa_tiga' => 'Lolla Mariah',
            'nip_satu' => '1993021',
            'pembimbing_satu' => 'FULAN',
            'nip_dua' => '1993022',
            'pembimbing_dua' => 'FULANAH',
            'kelas' => 'D3-3A',
            'periode' => 2024,
            'tahapan_progres' => 3,
        ]);
    }
}
