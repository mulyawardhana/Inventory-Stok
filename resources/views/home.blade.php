@extends('layouts.master')
@section('content')
<title>Dashboard | MWD</title>

@if( Session::get('berhasil') !="")
<div class='alert alert-success'><center><b>{{Session::get('berhasil')}}</b></center></div>        
@endif
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
	<a href="/transaksi">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Transaksi</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_transaksi}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-circle fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
  </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
	<a href="/terjual">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendapatan</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{number_format($jumlah_pendapatan,0,',','.')}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
  </a>
</div>

<div class="col-xl-3 col-md-6 mb-4">
	<a href="/stok">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Barang</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_barang}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-briefcase fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
  </a>
</div>


<!-- Pending Requests Card Example -->

<div class="col-xl-3 col-md-6 mb-4">
<a href="/barangIn">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Barang Masuk</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_barang_masuk}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</a
</div>



@endsection
