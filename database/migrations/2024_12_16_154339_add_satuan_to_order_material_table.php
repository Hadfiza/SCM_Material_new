<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSatuanToOrderMaterialTable extends Migration
{
    /**
     * Menjalankan migration untuk menambahkan kolom satuan.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->enum('satuan', ['unit', 'box'])->default('unit'); // Menambahkan kolom satuan dengan enum
        });
    }

    /**
     * Membalikkan perubahan yang dilakukan oleh migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropColumn('satuan'); // Menghapus kolom satuan
        });
    }
}
