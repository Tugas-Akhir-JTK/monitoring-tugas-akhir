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
            UserSeeder::class,
            KotaSeeder::class,
            ArtefakSeeder::class,
            ResumeBimbinganSeeder::class,
            KotaHasUserSeeder::class,
        ]);
    }
}
