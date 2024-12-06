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
    Schema::create('proyek', function (Blueprint $table) {
        $table->id();
        $table->string('nama_proyek', 255);
        $table->enum('status', ['aktif', 'selesai', 'tertunda']);
        $table->string('lokasi', 255);
        $table->unsignedBigInteger('material_id'); // Relasi ke material
        $table->timestamps();

        $table->foreign('material_id')->references('id')->on('material_proyek')->onDelete('cascade');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
