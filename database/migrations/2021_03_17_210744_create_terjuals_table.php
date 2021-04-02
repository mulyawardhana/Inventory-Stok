<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerjualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terjuals', function (Blueprint $table) {
            $table->id();
            $table->integer('barang_id');
            $table->integer('qty');
            $table->string('inv');
            $table->string('lokasi')->nullable();
            $table->integer('total_harga')->nullable();
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
        Schema::dropIfExists('terjuals');
    }
}
