<?php

namespace Database\Seeders;

use App\Models\TimelineUtamaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TimelineUtamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimelineUtamaModel::create([
            'periode_id' => 3,
            'nama_timeline' => 'Seminar 1',
            'deskripsi_timeline' => "",
            'tanggal_mulai' => '2024-02-25',
            'tanggal_selesai' => '2024-03-4'
        ]);

        TimelineUtamaModel::create([
            'periode_id' => 2,
            'nama_timeline' => 'Seminar 1',
            'deskripsi_timeline' => 'Seminar 1 dilaksanakan pada minggu pertama pada bulan Maret dengan evaluator dari koordinator TA',
            'tanggal_mulai' => '2024-02-25',
            'tanggal_selesai' => '2024-03-4'
        ]);

        TimelineUtamaModel::create([
            'periode_id' => 2,
            'nama_timeline' => 'Seminar 2',
            'deskripsi_timeline' => 'Seminar 3 dilaksanakan pada minggu pertama pada bulan Maret dengan evaluator dari koordinator TA',
            'tanggal_mulai' => '2024-04-25',
            'tanggal_selesai' => '2024-05-4'
        ]);
    }
}
