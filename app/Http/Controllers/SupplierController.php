<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        $max = Supplier::where('kode_supplier', \DB::raw("(select max(`kode_supplier`) from suppliers)"))->pluck('kode_supplier');
        $check_max = Supplier::all()->count();
        if($check_max == null){
            $kode_supplier = "SP0001";
        }else{
            $kode_supplier = $max[0];
            $kode_supplier++;
        }
        return view('supplier.index',compact('supplier','kode_supplier'));
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
            'kode_supplier'       => 'required',
            'nama_supplier'     => 'required',
        ]);
        $supplier = Supplier::create([
            'kode_supplier'  => $request->kode_supplier,
            'nama_supplier'  => $request->nama_supplier,
            'no_wa'          => $request->no_wa,
        ]);

        return redirect('/supplier')->with('pesan','Data berhasil di input');
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
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
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
            'nama_supplier'       => 'required',
            'kode_supplier'       => 'required',
            ]);
        $supplier = [
            'nama_supplier'     => $request->nama_supplier,
            'kode_supplier'     => $request->kode_supplier,
            'no_wa'     => $request->no_wa,
        ];
         Supplier::whereId($id)->update($supplier);

        return redirect('/supplier')->with('pesan','Data berhasil di input');

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
