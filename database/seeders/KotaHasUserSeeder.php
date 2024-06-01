<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class KotaHasUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_kota_has_user')->insert([
            [   
                'id_kota' => 1, 
                'id_user' => 2,
            ],
            [   
                'id_kota' => 1, 
                'id_user' => 3,
            ],
            [   
                'id_kota' => 1, 
                'id_user' => 4,
            ],
            [   
                'id_kota' => 2, 
                'id_user' => 5,
            ],
            [   
                'id_kota' => 2, 
                'id_user' => 6,
            ],
            [   
                'id_kota' => 2, 
                'id_user' => 7,
            ],
            [   
                'id_kota' => 3, 
                'id_user' => 8,
            ],
            [   
                'id_kota' => 3, 
                'id_user' => 9,
            ],
            [   
                'id_kota' => 3, 
                'id_user' => 10,
            ],
            [   
                'id_kota' => 4, 
                'id_user' => 11,
            ],
            [   
                'id_kota' => 4, 
                'id_user' => 12,
            ],
            [   
                'id_kota' => 4, 
                'id_user' => 13,
            ],
            [   
                'id_kota' => 5, 
                'id_user' => 14,
            ],
            [   
                'id_kota' => 5, 
                'id_user' => 15,
            ],
            [   
                'id_kota' => 5, 
                'id_user' => 16,
            ],
            [   
                'id_kota' => 6, 
                'id_user' => 17,
            ],
            [   
                'id_kota' => 6, 
                'id_user' => 18,
            ],
            [   
                'id_kota' => 6, 
                'id_user' => 19,
            ],
            [   
                'id_kota' => 1, 
                'id_user' => 20,
            ],
            [   
                'id_kota' => 1, 
                'id_user' => 21,
            ],
            [   
                'id_kota' => 2, 
                'id_user' => 22,
            ],
            [   
                'id_kota' => 2, 
                'id_user' => 23,
            ],
            [   
                'id_kota' => 3, 
                'id_user' => 24,
            ],
            [   
                'id_kota' => 3, 
                'id_user' => 25,
            ],
            [   
                'id_kota' => 4, 
                'id_user' => 21,
            ],
            [   
                'id_kota' => 4, 
                'id_user' => 23,
            ],
            [   
                'id_kota' => 5, 
                'id_user' => 22,
            ],
            [   
                'id_kota' => 5, 
                'id_user' => 24,
            ],
            [   
                'id_kota' => 6, 
                'id_user' => 20,
            ],
            [   
                'id_kota' => 6, 
                'id_user' => 25,
            ],
        ]);
    }
}
