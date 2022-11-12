<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('no_customer')->unique();
            $table->string('nama_lengkap');
            $table->string('no_kualitas_tlr')->unique();
            $table->integer('harga_lama');
            $table->string('jumlah_satuan_pembelian'); //kg atau peti
            $table->integer('berat_pembelian'); //jumlah berat pembelian
            $table->integer('total_harga');
            $table->string('no_kontak');
            $table->string('alamat_customer');
            $table->string('kwitansi')->nullable();
            $table->string('pembuat');
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
        Schema::dropIfExists('rekap_pelanggans');
    }
}
