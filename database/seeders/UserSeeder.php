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
            'role' => 1,
            'name' => 'Trisna',
            'nomor_induk' => 211511048,
            'email' => 'admin@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Bagus',
            'nomor_induk' => '211511001',
            'email' => 'bagus@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Reyna',
            'nomor_induk' => '211511002',
            'email' => 'reyna@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Nazwa',
            'nomor_induk' => '211511003',
            'email' => 'nazwa@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Aca',
            'nomor_induk' => '211511004',
            'email' => 'aca@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Haidar',
            'nomor_induk' => '211511005',
            'email' => 'haidar@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Diaz',
            'nomor_induk' => '211511006',
            'email' => 'diaz@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Apip',
            'nomor_induk' => '211511007',
            'email' => 'apip@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Salman',
            'nomor_induk' => '211511008',
            'email' => 'salman@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Zahra',
            'nomor_induk' => '211511009',
            'email' => 'zahra@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Nurul',
            'nomor_induk' => '211511010',
            'email' => 'nurul@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Jundy',
            'nomor_induk' => '211511011',
            'email' => 'jundy@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Fiqli',
            'nomor_induk' => '211511012',
            'email' => 'fiqli@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Hafid',
            'nomor_induk' => '211511013',
            'email' => 'hafid@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Benny',
            'nomor_induk' => '211511014',
            'email' => 'benny@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Yoga',
            'nomor_induk' => '211511015',
            'email' => 'yoga@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Uqy',
            'nomor_induk' => '211511016',
            'email' => 'uqy@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Andre',
            'nomor_induk' => '211511017',
            'email' => 'andre@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Lola',
            'nomor_induk' => '211511018',
            'email' => 'lola@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Mariah',
            'nomor_induk' => '211611001',
            'email' => 'mariah@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Bunga',
            'nomor_induk' => '211611002',
            'email' => 'bunga@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Sarah',
            'nomor_induk' => '211611003',
            'email' => 'sarah@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Catlin',
            'nomor_induk' => '211611004',
            'email' => 'catlin@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Bagas',
            'nomor_induk' => '211611005',
            'email' => 'bagas@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Joni',
            'nomor_induk' => '211611006',
            'email' => 'joni@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Rofi',
            'nomor_induk' => '211611007',
            'email' => 'rofi@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 2,
            'name' => 'Faul',
            'nomor_induk' => '211611008',
            'email' => 'faul@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Kevin',
            'nomor_induk' => '211511019',
            'email' => 'kevin@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Rivan',
            'nomor_induk' => '211511020',
            'email' => 'rivan@example.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::create([
            'role' => 3,
            'name' => 'Syahrul',
            'nomor_induk' => '211511021',
            'email' => 'syahrul@example.com',
            'password' => Hash::make('1234567890'),
        ]);

    }

}
