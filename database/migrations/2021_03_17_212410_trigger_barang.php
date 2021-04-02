<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER `barang_in` BEFORE INSERT ON `barang_ins`
             FOR EACH ROW BEGIN
                UPDATE barang SET stok=stok+NEW.jumlah
                WHERE id = NEW.barang_id;
            END
        ');
        DB::unprepared('CREATE TRIGGER `barang_update` AFTER UPDATE ON `barang_ins`
         FOR EACH ROW BEGIN
            UPDATE barang SET stok=stok+NEW.jumlah-OLD.jumlah
            WHERE id = NEW.barang_id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
