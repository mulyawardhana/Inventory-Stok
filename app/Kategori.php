<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id'];
    public function Barang()
    {
    	return $this->hasMany('App\Barang');
    }
    public function BarangIn()
    {
    	return $this->hasMany('App\BarangIn');
    }
}
