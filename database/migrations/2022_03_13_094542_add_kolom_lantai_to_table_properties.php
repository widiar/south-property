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
            $table->integer('lantai')->nullable()->default(0);
            $table->integer('kamar_mandi')->nullable()->default(0);
            $table->integer('kamar_tidur')->nullable()->default(0);
            $table->integer('kamar_pegawai')->nullable()->default(0);
            $table->integer('kamar_mandi_pegawai')->nullable()->default(0);
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
            $table->dropColumn(['lantai', 'kamar_mandi', 'kamar_tidur', 'kamar_pegawai', 'kamar_mandi_pegawai']);
        });
    }
};
