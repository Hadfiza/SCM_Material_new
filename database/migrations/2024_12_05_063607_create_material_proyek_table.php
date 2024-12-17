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
        Schema::create('material_proyek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_material', 255);
            $table->integer('stok');

            // $table->unsignedBigInteger('proyek_id'); // Relasi ke proyek
            // $table->unsignedBigInteger('detailproyek_id'); // Relasi ke detail_proyek
            $table->unsignedBigInteger('pengiriman_id'); // Relasi ke detail_proyek
            $table->unsignedBigInteger('material_id')->nullable(); // Relasi ke pemasok

            $table->timestamps();

            // Relasi ke tabel proyek
            // $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');

            // Relasi ke detail_proyek
            // $table->foreign('detailproyek_id')->references('id')->on('detail_proyek')->onDelete('cascade');

            // Relasi ke tabel pengiriman jika diperlukan
            $table->foreign('pengiriman_id')->references('id')->on('pengiriman')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('material_pemasok')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_proyek');
    }
};
