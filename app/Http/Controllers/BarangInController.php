<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangIn;
use App\Supplier;
use App\Barang;

class BarangInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangIn = BarangIn::all();
        $supplier = Supplier::all();
        $barang = Barang::all();

        return view('barang_in.index', compact('barangIn','supplier','barang'));
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
            'supplier_id'   => 'required',
            'harga_beli'    => 'required',
            'jumlah'        => 'required',
        ]);

        BarangIn::create([
            'supplier_id'   => $request->supplier_id,
            'barang_id'     => $request->barang_id,
            'harga_beli'    => $request->harga_beli,
            'jumlah'        => $request->jumlah,
            'total_harga'   => $request->jumlah * $request->harga_beli,
        ]);

        return redirect('/barangIn')->with('pesan','Data Master berhasil di Edit');
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
        $barangIn = BarangIn::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('barang_in.edit', compact('barangIn','barang','supplier'));
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
            'supplier_id'   => 'required',
            'barang_id'     => 'required',
            'harga_beli'    => 'required',
            'jumlah'        => 'required',
        ]);

        $barang = [
            'supplier_id'   => $request->supplier_id,
            'barang_id'     => $request->barang_id,
            'harga_beli'    => $request->harga_beli,
            'jumlah'        => $request->jumlah,
            'total_harga'   => $request->jumlah * $request->harga_beli,
        ];
        BarangIn::whereId($id)->update($barang);

        return redirect('/barangIn')->with('pesan','Data Master berhasil di Edit');
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
