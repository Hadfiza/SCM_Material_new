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
        Schema::table('material_proyek', function (Blueprint $table) {
            $table->decimal('harga_satuan', 10, 2)->after('nama_material'); // Menambahkan harga_satuan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_proyek', function (Blueprint $table) {
            $table->dropColumn('harga_satuan'); // Menghapus kolom harga_satuan jika rollback
        });
    }
};
