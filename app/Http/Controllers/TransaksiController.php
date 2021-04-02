<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terjual;
use App\Barang;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Terjual::all();
        $barang = Barang::all();

        $max = DB::table('terjuals')->where('inv', \DB::raw("(select max(`inv`) from terjuals)"))->pluck('inv');
        $check_max = DB::table('terjuals')->count();
        if($check_max ==null){
            $inv = 'INV/00001';
        }else{
            $inv = $max[0];
            $inv++;
        }
        return view('transaksi.index', compact('transaksi','inv','barang'));
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
            'barang_id'   => 'required',
            'qty'       => 'required|numeric',
            'inv'           => 'required',
        ]);
        $barang = Barang::find($request->barang_id);
        if($barang->stok < $request->qty){
            return redirect('/transaksi')->with('pesan1','Maaf Stok anda tidak mencukupi silahkan cek Stok Barang');
        }else{
            $terjual = Terjual::create([
            'barang_id'       => $request->barang_id,
            'qty'           => $request->qty,
            'total_harga'   => $request->qty *$barang->harga_jual,
            'inv'           => $request->inv,
            'lokasi'           => $request->lokasi,
        ]);
        }
        

        return redirect('/transaksi')->with('pesan','Data Berhasil di Tambahkan');
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
        //
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
        //
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
