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
            $table->decimal('harga_satuan', 10, 2)->after('material_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropColumn('harga_satuan');
        });
    }

};
