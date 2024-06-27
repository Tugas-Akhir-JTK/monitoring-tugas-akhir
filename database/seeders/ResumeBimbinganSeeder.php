<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResumeBimbinganModel;
use Carbon\Carbon;

class ResumeBimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResumeBimbinganModel::create([
            'tanggal_bimbingan' => Carbon::create('2024', '05', '15'),
            'waktu_bimbingan' => '10:30:00',
            'isi_resume_bimbingan' => 'Diskusi awal mengenai topik tugas akhir.',
            'isi_revisi_bimbingan' => '-', // Tambahkan nilai default di sini
            'progres_pengerjaan' => 20,
            'tahapan_progres' => 2,
            'sesi_bimbingan' => 1,
        ]);

        ResumeBimbinganModel::create([
            'tanggal_bimbingan' => Carbon::create('2024', '05', '15'),
            'waktu_bimbingan' => '10:30:00',
            'isi_resume_bimbingan' => 'Diskusi awal mengenai topik tugas akhir.',
            'isi_revisi_bimbingan' => '-', // Tambahkan nilai default di sini
            'progres_pengerjaan' => 20,
            'tahapan_progres' => 2,
            'sesi_bimbingan' => 2,
        ]);

        ResumeBimbinganModel::create([
            'tanggal_bimbingan' => Carbon::create('2024', '06', '05'),
            'waktu_bimbingan' => '09:00:00',
            'isi_resume_bimbingan' => 'Revisi proposal dan persiapan seminar.',
            'isi_revisi_bimbingan' => '-', // Tambahkan nilai default di sini
            'progres_pengerjaan' => 60,
            'tahapan_progres' => 2,
            'sesi_bimbingan' => 3,
        ]);
    }
}
