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
        Schema::create('property_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_provinsi');
            $table->string('provinsi');
            $table->unsignedBigInteger('id_kabupaten');
            $table->string('kabupaten');
            $table->unsignedBigInteger('id_kecamatan');
            $table->string('kecamatan');
            $table->unsignedBigInteger('id_kelurahan');
            $table->string('kelurahan');
            $table->string('area')->nullable();
            $table->string('latlng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_locations');
    }
};
