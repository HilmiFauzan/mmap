<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaTelurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_telurs', function (Blueprint $table) {
            $table->id();
            $table->string('no_kualitas_tlr')->unique();
            $table->string('jenis_kualitas_telur');
            $table->integer('harga_telur');
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
        Schema::dropIfExists('harga_telurs');
    }
}
