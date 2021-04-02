<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangIn extends Model
{
    protected $guarded = ['id'];

    public function Barang()
    {
    	return $this->belongsTo('App\Barang');
    }
        public function Supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }

    
}
