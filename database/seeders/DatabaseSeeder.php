<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create();
        $this->call([
            PeriodeSeeder::class,
            UserSeeder::class,
            TimelineUtamaSeeder::class,
            KotaSeeder::class,
            TimelineKotaSeeder::class,
            ArtefakSeeder::class,
            ArtefakTerkumpulSeeder::class,
            JadwalPengujiSeeder::class,
            ResumeSeeder::class,
        ]);
    }
}
