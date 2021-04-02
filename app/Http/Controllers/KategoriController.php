<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use DataTables;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
    	$kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_kategori'	=> 'required',
    	]);
    	$kategori = Kategori::create([
    		'nama_kategori'	=> $request->nama_kategori,
    	]);
    	 return redirect('/kategori')->with('pesan','Data Master berhasil di tambahkan');
    }
    public function edit($id)
    {
    	$kategori = Kategori::findOrFail($id);
    	return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'nama_kategori'	=> 'required',
    	]);
    	
    	$kategori =[
    		'nama_kategori'	=> $request->nama_kategori,
    	];
    	Kategori::whereId($id)->update($kategori);
    	return redirect('/kategori')->with('pesan','Data Master berhasil di Edit');
    }
    public function destroy($id)
    {
        $master = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/Kategori')->with('pesan','Data Kategori berhasil di hapus');   
    }
}
