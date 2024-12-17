<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->string('nama_pemasok')->nullable(); // Menambahkan kolom nama_material
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropColumn('nama_pemasok'); // Menghapus kolom jika migrasi dibatalkan
        });
    }
};
