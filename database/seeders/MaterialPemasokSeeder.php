<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialPemasokSeeder extends Seeder
{
    public function run()
    {
        DB::table('material_pemasok')->insert([
            [
                'nama_material' => 'Material 1',
                'stok' => 50,
                'harga_satuan' => 100000,
                'jenis_material' => 'Bagus',
                'pemasok_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_material' => 'Material 2',
                'stok' => 100,
                'harga_satuan' => 200000,
                'jenis_material' => 'Bagus',
                'pemasok_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_material' => 'Material 3',
                'stok' => 40,
                'harga_satuan' => 300000,
                'jenis_material' => 'Bagus',
                'pemasok_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
