<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', 'KategoriController');
Route::resource('stok', 'StokController');
Route::resource('barang', 'BarangController');
Route::resource('supplier', 'SupplierController');
Route::resource('barangIn', 'BarangInController');
Route::resource('terjual', 'TerjualController');
Route::resource('transaksi', 'TransaksiController');
Route::get('/ambil','TerjualController@ambil');
Route::get('/laporan', 'LaporanController@index');
Route::post('/laporan_masuk', 'LaporanController@index');
Route::get('/laporan/export_pdf', 'LaporanController@cetak_pdf');
Route::get('/laporan/barang-masuk', 'LaporanController@laporan');
Route::post('/laporan-masuk', 'LaporanController@laporan');
Route::get('/laporan/stok', 'LaporanController@stok_barang');
Route::get('/print-pdf', 'LaporanController@print_pdf');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
