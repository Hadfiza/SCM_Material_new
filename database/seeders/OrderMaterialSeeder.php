<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderMaterialSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_material')->insert([
            [
                'material_id' => 1,
                'pengiriman_id' => NULL,
                'jumlah_order' => 20,
                'tanggal_order' => '2024-12-10',
                'keterangan' => 'Keterangan 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'material_id' => 2,
                'pengiriman_id' => NULL,
                'jumlah_order' => 30,
                'tanggal_order' => '2024-12-13',
                'keterangan' => 'Keterangan 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'material_id' => 1,
                'pengiriman_id' => NULL,
                'jumlah_order' => 25,
                'tanggal_order' => '2024-12-11',
                'keterangan' => 'Keterangan 3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
