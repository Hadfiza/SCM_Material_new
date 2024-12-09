<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasokSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemasok')->insert([
            [
                'nama_pemasok' => 'Pemasok 1',
                'alamat' => 'JL. Disana Jauh 02',
                'kontak' => '08212143124',
                'kontrak_id' => 1,
                'rating_pemasok' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_pemasok' => 'Pemasok 2',
                'alamat' => 'JL. Disana Jauh 4',
                'kontak' => '08212143124',
                'kontrak_id' => 2,
                'rating_pemasok' => 90,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_pemasok' => 'Pemasok 3',
                'alamat' => 'JL. Disana Deket 44',
                'kontak' => '08212113445',
                'kontrak_id' => 3,
                'rating_pemasok' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
