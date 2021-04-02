<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = ['id'];

    public function Kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }
    public function BarangIn()
    {
    	return $this->hasMany('App\BarangIn');
    }
    public function Terjual()
    {
        return $this->hasMany('App\Terjual');
    }

}
