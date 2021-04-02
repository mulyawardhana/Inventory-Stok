<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terjual extends Model
{
    protected $guarded=['id'];

    public function Stok()
    {
    	return $this->belongsTo('App\Stok');
    }
    public function Barang()
    {
    	return $this->belongsTo('App\Barang');
    }
}
