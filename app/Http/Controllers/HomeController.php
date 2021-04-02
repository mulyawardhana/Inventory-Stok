<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terjual;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_pendapatan=DB::table('terjuals')->sum('total_harga');
        $jumlah_transaksi=DB::table('terjuals')->count();
        $jumlah_barang=DB::table('barang')->count();
        $jumlah_barang_masuk = DB::table('barang_ins')->count();

        
         return view('home',compact('jumlah_pendapatan','jumlah_transaksi','jumlah_barang','jumlah_barang_masuk'));
    }
}
