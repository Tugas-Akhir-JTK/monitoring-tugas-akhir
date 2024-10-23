<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timelines = [
            [
                'nama_kegiatan' => 'Seminar 1',
                'tanggal_mulai' => '2024-02-25',
                'tanggal_selesai' => '2024-03-4',
                'deskripsi' => 'Seminar 1 dilaksanakan pada minggu pertama pada bulan Maret dengan evaluator dari koordinator TA',
            ],
            [
                'nama_kegiatan' => 'Seminar 2',
                'tanggal_mulai' => '2024-03-05',
                'tanggal_selesai' => '2024-04-04',
                'deskripsi' => 'Seminar 2 dilaksanakan pada minggu pertama pada bulan April dengan evaluator dari koordinator TA',
            ],
            // [
            //     'nama_kegiatan' => 'Seminar 3',
            //     'tanggal_mulai' => '2024-04-05',
            //     'tanggal_selesai' => '2024-05-04',
            //     'deskripsi' => 'Seminar 3 dilaksanakan pada minggu pertama pada bulan Mei dengan dosen penguji',
            // ],
            // [
            //     'nama_kegiatan' => 'Sidang',
            //     'tanggal_mulai' => '2024-06-05',
            //     'tanggal_selesai' => '2024-07-15',
            //     'deskripsi' => 'Sidang dilaksanakan pada minggu pertama pada bulan Juni dengan dosen penguji',
            // ],
            // [
            //     'nama_kegiatan' => 'Yudisium 1',
            //     'tanggal_mulai' => '2024-06-05',
            //     'tanggal_selesai' => '2024-07-15',
            //     'deskripsi' => 'Sidang dilaksanakan pada minggu pertama pada bulan Juni dengan dosen penguji',
            // ],
        ];

        DB::table('tbl_timeline')->insert($timelines);
    }
}
