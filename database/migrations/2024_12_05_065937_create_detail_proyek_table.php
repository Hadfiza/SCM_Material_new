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
        Schema::create('detail_proyek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id'); // Relasi ke material_proyek
            $table->unsignedBigInteger('proyek_id');   // Relasi ke proyek
            $table->integer('jumlah_digunakan');
            $table->date('tanggal_digunakan');
            $table->text('keterangan');
            $table->decimal('biaya_penggunaan', 10, 2);
            $table->timestamps();

            // Relasi ke tabel material_proyek
            $table->foreign('material_id')->references('id')->on('material_proyek')->onDelete('cascade');

            // Relasi ke tabel proyek
            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_proyek');
    }
};
