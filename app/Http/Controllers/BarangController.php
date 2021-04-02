<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\BarangIn;
use App\Kategori;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $kategori = kategori::all();

        $max = Barang::where('kode_barang',\DB::raw("(select max(`kode_barang`) from Barang)"))->pluck('kode_barang');
        $check_max=Barang::all()->count();
        if($check_max == null){
            $kode_barang = "MWD0001";
        }else{
            $kode_barang = $max[0];
            $kode_barang++;
        }
        return view('barang.index', compact('barang','kategori','kode_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori_id'       => 'required',
            'kode_barang'       => 'required',
            'nama_barang'       => 'required', 
            'harga_jual'        => 'required',
            'gambar'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size'              => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $barang = Barang::create([
            'kategori_id'       => $request->kategori_id,
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       => $request->nama_barang,
            'harga_jual'        => $request->harga_jual,
            'stok'              => $request->stok,
            'gambar'            => $new_gambar,
            'size'              => $request->size,
        ]);

          $gambar->move(public_path('images'), $new_gambar);

         return redirect('/barang')->with('pesan','Data Master berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = kategori::all();
        return view('barang.edit', compact('barang','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kategori_id'       => 'required',
            'kode_barang'       => 'required',
            'nama_barang'       => 'required', 
            'gambar'            => 'required'
        ]);
        if($request->has('gambar')){

            $gambar =$request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $new_gambar);

            $barang = [
            'kategori_id'       => $request->kategori_id,
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       => $request->nama_barang,
            'harga_jual'        => $request->harga_jual,
            'stok'              => $request->stok,
            'gambar'            => $new_gambar,
            'size'              => $request->size,
        ];
        }else{
        $barang = [
            'kategori_id'       => $request->kategori_id,
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       => $request->nama_barang,
            'harga_jual'        => $request->harga_jual,
            'created_at'        => $request->created_at,
            'gambar'            => $request->gambar,
        ];
        }
        Barang::whereId($id)->update($barang);
        return redirect('/barang')->with('pesan','Data Master berhasil di Edit');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
