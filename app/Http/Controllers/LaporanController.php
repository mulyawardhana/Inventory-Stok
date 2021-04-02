<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terjual;
use App\Barang;
use App\BarangIn;
use PDF;
use DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
    	$transaksi = Terjual::whereBetween('created_at',[$request->tanggal1,$request->tanggal2])->get();
   
    	$hitung =count($transaksi);
	 	$req1=$request->tanggal1;
        $req2=$request->tanggal2;
        return view('laporan/index',compact('transaksi','hitung','req1','req2'));
    }
     public function cetak_pdf(Request $request)
    {
        $laporans = Terjual::whereBetween('created_at',[$request->tanggal1,$request->tanggal2])->get();
      $pdf = PDF::loadview('laporan.laporan_pdf',compact('laporans'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');
    }
    public function laporan(Request $request)
    {
        $transaksi = BarangIn::whereBetween('created_at',[$request->tanggal1, $request->tanggal2])->get();
        $hitung =count($transaksi);
        $req1=$request->tanggal1;
        $req2=$request->tanggal2;
        return view('laporan/masuk',compact('transaksi','hitung','req1','req2')); 
    }
    public function print_pdf(Request $request)
    {
        $laporans = BarangIn::whereBetween('created_at',[$request->tanggal1,$request->tanggal2])->get();
      $pdf = PDF::loadview('laporan.masuk_pdf',compact('laporans'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');
    }
    public function stok_barang()
    {
        $barangs = Barang::all();
        return view('laporan.stok_barang', compact('barangs'));
    }
}
