<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArtefakModel;

class ArtefakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => null,
            'nama_artefak' => 'FTA 01',
            'deskripsi_artefak' => 'Persetujuan menjadi Dosen Pembimbing',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => null,
            'nama_artefak' => 'FTA 02',
            'deskripsi_artefak' => 'Pengajuan Topik Tugas Akhir',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => 2,
            'nama_artefak' => 'FTA 03',
            'deskripsi_artefak' => 'Persetujuan Menjadi Pembimbing Tugas Akhir',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => 3,
            'nama_artefak' => 'FTA 04',
            'deskripsi_artefak' => 'Penilaian Seminar 1',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' =>null,
            'nama_artefak' => 'FTA 05',
            'deskripsi_artefak' => 'Seminar 1',
            'kategori_artefak' => 'Kehadiran Seminar 1',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => 1,
            'nama_artefak' => 'FTA 05a',
            'deskripsi_artefak' => 'Lesson Learn Seminar 1',
            'kategori_artefak' => 'Resume Seminar 1',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'periode_id' => 3,
            'timeline_utama_id' => 2,
            'nama_artefak' => 'Proposal Tugas Akhir',
            'deskripsi_artefak' => 'Dokumen Lengkap Proposal Tugas Akhir',
            'kategori_artefak' => 'Dokumen',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);
    }
}
