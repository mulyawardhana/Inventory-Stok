<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->string('nama_barang');
            $table->string('gambar');
            $table->string('stok')->nullable()->default(0);
            $table->string('kode_barang')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->integer('terjuals_id')->nullable();
            $table->integer('barang_ins_id')->nullable();
            $table->string('size');
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
        Schema::dropIfExists('barang');
    }
}
