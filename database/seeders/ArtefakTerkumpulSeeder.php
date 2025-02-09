<?php

namespace Database\Seeders;

use App\Models\ArtefakTerkumpulModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtefakTerkumpulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArtefakTerkumpulModel::create([
            'artefak_id' => 3,
            'kota_id' => 2,
            'file_name' => 'FTA 01',
            'file_path' => '/localdisk-D',
            'tanggal_pengumpulan' => '2024-06-30 23:59:00',
            'status_pengumpulan' => 'tepat_waktu',
        ]);
    }
}
