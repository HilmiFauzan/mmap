<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiTelursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_telurs', function (Blueprint $table) {
            $table->id();
            $table->string('no_produksi')->unique();
            $table->integer('ttl_tiap_kdng');
            $table->integer('ttl_berat_tiap_kdng');
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
        Schema::dropIfExists('produksi_telurs');
    }
}
