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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('lokasi');
            $table->text('deskripsi');
            $table->unsignedBigInteger('harga');
            $table->integer('luas');
            $table->string('tipe');
            $table->integer('count_view')->default(0);
            $table->integer('count_clicked')->default(0);
            $table->text('fasilitas');
            $table->boolean('is_sold')->default(0);
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
        Schema::dropIfExists('properties');
    }
};
