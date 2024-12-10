<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontrakSeeder extends Seeder
{
    public function run()
    {
        DB::table('kontrak')->insert([
            [
                'tanggal_mulai' => '2024-10-12',
                'tanggal_selesai' => '2024-10-22',
                'deskripsi' => 'Kontrak Untuk Barang Baru 1',
                'bukti_kontrak' => 'kontrak1.pdf',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tanggal_mulai' => '2024-11-01',
                'tanggal_selesai' => '2024-10-20',
                'deskripsi' => 'Kontrak Untuk Barang Baru 2',
                'bukti_kontrak' => 'kontrak2.pdf',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tanggal_mulai' => '2024-11-10',
                'tanggal_selesai' => '2024-11-25',
                'deskripsi' => 'Kontrak Untuk Barang Baru 3',
                'bukti_kontrak' => 'kontrak2.pdf',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
