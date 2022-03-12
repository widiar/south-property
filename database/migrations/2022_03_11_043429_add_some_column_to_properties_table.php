<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('harga_satuan')->default(0);
            $table->string('sub_tipe')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['harga_satuan', 'sub_tipe', 'location_id', 'panjang', 'lebar']);
        });
    }
};
