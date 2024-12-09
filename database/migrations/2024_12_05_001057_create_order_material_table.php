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
        Schema::create('order_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id'); // Relasi ke tabel material
            // $table->unsignedBigInteger('pengiriman_id')->nullable(); // Relasi ke tabel pengiriman (nullable)
            $table->integer('jumlah_order');
            $table->date('tanggal_order');
            // $table->enum('status_order', ['pending', 'proses', 'selesai', 'batal']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Relasi ke tabel material
            $table->foreign('material_id')->references('id')->on('material_pemasok')->onDelete('cascade');

            // Relasi ke tabel pengiriman jika diperlukan
            // $table->foreign('pengiriman_id')->references('id')->on('pengiriman')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_material');
    }
};
