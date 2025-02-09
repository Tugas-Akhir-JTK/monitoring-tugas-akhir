<?php

namespace Database\Seeders;

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
            'role' => 1,
            'nomor_induk' => 198608202019031014,
            'nama' => 'Trisna',
            'kelas' => null,
            'email' => 'trisna@polban.ac.id',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 4,
            'nomor_induk' => 197109031999032001,
            'nama' => 'Santi Sundari',
            'kelas' => null,
            'email' => 'santi@polban.ac.id',
            'password' => Hash::make('1234567890'),
        ]);

        // Head of Study Program (Kaprodi D3)
        User::create([
            'role' => 5,
            'nomor_induk' => 199301062019031017,
            'nama' => 'Lukmannul Hakim Firdaus',
            'kelas' => null,
            'email' => 'lukmannul@polban.ac.id',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 4,
            'nama' => 'Lukman',
            'nomor_induk' => '311711001',
            'kelas' => null,
            'email' => 'lukman@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Rivan',
            'nomor_induk' => '211511055',
            'kelas' => "D3 - 3B",
            'email' => 'rivan@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Bagus',
            'nomor_induk' => '211511067',
            'kelas' => "D3 - 3A",
            'email' => 'bagus@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Haposan',
            'nomor_induk' => '211511062',
            'kelas' => "D3 - 3B",
            'email' => 'haposan@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'nama' => 'Rizqi',
            'nomor_induk' => '3117110021',
            'kelas' => null,
            'email' => 'rizqi@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'nama' => 'Sandy',
            'nomor_induk' => '3117112129',
            'kelas' => null,
            'email' => 'sandy@example.com',
            'password' => Hash::make('1234567890'),
        ]);
        
    }

}
