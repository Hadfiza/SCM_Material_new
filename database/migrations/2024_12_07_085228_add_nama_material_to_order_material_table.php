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
            $table->string('nama_material')->nullable(); // Menambahkan kolom nama_material
        });
    }

    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropColumn('nama_material'); // Menghapus kolom jika migrasi dibatalkan
        });
    }

};
