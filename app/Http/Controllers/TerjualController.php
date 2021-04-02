<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terjual;
use App\Barang;
use DB;

class TerjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terjual = Terjual::all();
        $barang = Barang::all();

        $max = DB::table('terjuals')->where('inv', \DB::raw("(select max(`inv`) from terjuals)"))->pluck('inv');
        $check_max = DB::table('terjuals')->count();
        if($check_max ==null){
            $inv = 'INV/00001';
        }else{
            $inv = $max[0];
            $inv++;
        }
        return view('terjual.index',compact('terjual','barang','inv'));
    }
    public function ambil(Request $request)
    {
        $barang = DB::table("barang")
        ->where("id",$request->id)
        ->pluck("stok","harga_jual");
        return response()->json($barang);
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
            'qty'       => 'required',
            'lokasi'       => 'required',
            'inv'           => 'required',
        ]);
        $barang = Barang::find($request->barang_id);
        if($barang->stok < $request->qty){
            return redirect('/terjual')->with('pesan1','Maaf Stok anda tidak mencukupi silahkan cek Stok Barang');
        }else{
            $terjual = Terjual::create([
            'barang_id'       => $request->barang_id,
            'qty'           => $request->qty,
            'lokasi'        => $request->lokasi,
            'total_harga'   => $request->qty *$barang->harga_jual,
            'inv'           => $request->inv,
        ]);
        }
        

        return redirect('/terjual')->with('pesan','Data Berhasil di Tambahkan');

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
        $terjual = Terjual::findOrFail($id);
        $barang = Barang::all();
        return view('terjual.edit', compact('terjual','barang'));
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
            'barang_id'   => 'required',
            'qty'       => 'required',
            'lokasi'       => 'required',
        ]);
        $barang = Barang::find($request->barang_id);
        $terjual = [
            'barang_id'       => $request->barang_id,
            'qty'           => $request->qty,
            'lokasi'        => $request->lokasi,
            'total_harga'   => $request->qty *$barang->harga_jual,
            'inv'           => $request->inv,
        ];
        Terjual::whereId($id)->update($terjual);
        return redirect('/terjual')->with('pesan','Data Berhasil di Update');
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
