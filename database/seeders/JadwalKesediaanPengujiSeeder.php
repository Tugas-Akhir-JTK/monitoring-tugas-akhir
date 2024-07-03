<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JadwalKesediaanPengujiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_penguji' => 'Penguji 1',
                'tanggal_mulai' => '2024-07-01',
                'tanggal_selesai' => '2024-07-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penguji' => 'Penguji 2',
                'tanggal_mulai' => '2024-07-08',
                'tanggal_selesai' => '2024-07-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penguji' => 'Penguji 3',
                'tanggal_mulai' => '2024-07-01',
                'tanggal_selesai' => '2024-07-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penguji' => 'Penguji 4',
                'tanggal_mulai' => '2024-07-01',
                'tanggal_selesai' => '2024-07-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penguji' => 'Penguji 5',
                'tanggal_mulai' => '2024-07-08',
                'tanggal_selesai' => '2024-07-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tbl_jadwal_kesediaan_penguji')->insert($data);
    }
}
