<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PeriodeModel;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeriodeModel::create([
            'periode' => '2023'
        ]);
        PeriodeModel::create([
            'periode' => '2024'
        ]);
        PeriodeModel::create([
            'periode' => '2025'
        ]);
    }
}
