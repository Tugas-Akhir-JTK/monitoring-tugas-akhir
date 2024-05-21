<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'role' => 1,
            'name' => 'Rivan',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'id' => 2,
            'role' => 2,
            'name' => 'Regular User',
            'email' => 'dosbim@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'id' => 3,
            'role' => 3,
            'name' => 'Editor User',
            'email' => 'mhs@example.com',
            'password' => Hash::make('1234567890'),
        ]);

    }

}
