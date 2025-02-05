<?php

namespace Database\Seeders;

use App\Models\JadwalPengujiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPengujiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalPengujiModel::create([
            'kota_id' => 3,
            'timeline_utama_id' => 2,
            'dospem_id' => 8,
            'tanggal_mulai' => '2025-01-30 12:59:00',
            'tanggal_selesai' => '2025-02-01 12:59:00',
            'status' => 'sudah_fix',
        ]);

        JadwalPengujiModel::create([
            'kota_id' => 2,
            'timeline_utama_id' => 1,
            'dospem_id' => 9,
            'tanggal_mulai' => '2025-01-30 12:59:00',
            'tanggal_selesai' => '2025-02-01 12:59:00',
            'status' => 'perlu_konfirmasi',
        ]);
    }
}
