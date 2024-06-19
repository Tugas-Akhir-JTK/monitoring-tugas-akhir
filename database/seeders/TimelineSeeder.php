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
                'tanggal_selesai' => '2024-03-14',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel luctus lectus. Curabitur egestas augue eu est tincidunt, vel malesuada tellus.',
            ],
            [
                'nama_kegiatan' => 'Seminar 2',
                'tanggal_mulai' => '2024-03-05',
                'tanggal_selesai' => '2024-03-14',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel luctus lectus. Curabitur egestas augue eu est tincidunt, vel malesuada tellus.',
            ],
        ];

        DB::table('tbl_timeline')->insert($timelines);
    }
}
