<?php

namespace Database\Seeders;

use App\Models\ResumeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResumeModel::create([
            'kota_id' => 2,
            'timeline_utama_id' => 1,
            'dospem_id' => 9,
            'sesi_bimbingan' => 'Seminar 1',
            'tanggal_bimbingan' => '2025-02-01',
            'jam_mulai' => '12:59:00',
            'jam_selesai' => '14:59:00',
            'isi_resume_bimbingan' => 'ini contoh resume',
            'isi_revisi_bimbingan' => '',
        ]);

        ResumeModel::create([
            'kota_id' => 2,
            'timeline_utama_id' => 2,
            'dospem_id' => 8,
            'sesi_bimbingan' => 'Seminar 2',
            'tanggal_bimbingan' => '2025-04-01',
            'jam_mulai' => '12:59:00',
            'jam_selesai' => '14:59:00',
            'isi_resume_bimbingan' => 'ini contoh resume lagi lorem ipsum',
            'isi_revisi_bimbingan' => '',
        ]);
    }
}
