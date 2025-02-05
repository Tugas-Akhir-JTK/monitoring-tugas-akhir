<?php

namespace Database\Seeders;

use App\Models\TimelineKotaModel;
use Illuminate\Database\Seeder;

class TimelineKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimelineKotaModel::create([
            'kota_id' => 2,
            'timeline_utama_id' => 2,
            'nama_timeline' => 'SRS',
            'status' => 'Selesai',
            'tanggal_mulai' => '2024-02-25',
            'tanggal_selesai' => '2024-03-4'
        ]);
    }
}
