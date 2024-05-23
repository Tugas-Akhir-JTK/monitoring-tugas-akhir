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
            'nama_artefak' => 'FTA 01',
            'deskripsi' => 'Kesediaan Menjadi Dosen Pembimbing Tugas Akhir',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'nama_artefak' => 'FTA 02',
            'deskripsi' => 'Pengajuan Topik Tugas Akhir',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'nama_artefak' => 'FTA 05',
            'deskripsi' => 'Seminar 1',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'nama_artefak' => 'FTA 05a',
            'deskripsi' => 'Lesson Learn Seminar 1',
            'kategori_artefak' => 'FTA',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);

        ArtefakModel::create([
            'nama_artefak' => 'Proposal Tugas Akhir',
            'deskripsi' => 'Dokumen Lengkap Proposal Tugas Akhir',
            'kategori_artefak' => 'Dokumen',
            'tenggat_waktu' => '2024-06-30 23:59:00',
        ]);
    }
}
