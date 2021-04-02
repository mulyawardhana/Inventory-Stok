<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerTerjual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER `terjual` AFTER INSERT ON `terjuals`
             FOR EACH ROW BEGIN
                UPDATE barang SET stok=stok-NEW.qty
                WHERE id = NEW.barang_id;
            END
        ');
        DB::unprepared('CREATE TRIGGER `terjual_update` AFTER UPDATE ON `terjuals`
         FOR EACH ROW BEGIN
            UPDATE barang SET stok=stok-NEW.qty+OLD.qty
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
