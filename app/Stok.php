<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $guarded = ['id'];

    public function Barang()
    {
    	return $this->hasMany('App\Barang');
    }
    public function BarangIn()
    {
    	return $this->hasMany('App\Terjual');
    }
}
