<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->string('nomor_order')->nullable(); // Tambahkan kolom tanpa constraint unique terlebih dahulu
        });

        // Berikan nilai default untuk semua data yang sudah ada
        DB::table('order_material')->update([
            'nomor_order' => DB::raw("CONCAT('ORD-', DATE_FORMAT(NOW(), '%Y%m%d'), '-', id)")
        ]);

        // Tambahkan constraint unique setelah semua data memiliki nilai
        Schema::table('order_material', function (Blueprint $table) {
            $table->unique('nomor_order');
        });
    }

    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropUnique(['nomor_order']);
            $table->dropColumn('nomor_order');
        });
    }
    
};
