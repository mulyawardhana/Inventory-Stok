@extends('layouts.master')
@section('content')
<title>Data Kategori | MWD</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jenis</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
    	 	@if( Session::get('pesan') !="")
            <div class='alert alert-success'><center><b>{{Session::get('pesan')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-print"></i> Print Stok</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stok as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>{{$u->kategori->nama_kategori}}</td>
                        <td>{{$u->stok}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection