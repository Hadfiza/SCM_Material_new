<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_nama_material_and_nama_pemasok_to_ordermaterials.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaMaterialAndNamaPemasokToOrdermaterial extends Migration
{
    public function up()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->string('nama_material')->nullable();
            $table->string('nama_pemasok')->nullable();
        });
    }

    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropColumn(['nama_material', 'nama_pemasok']);
        });
    }
}
