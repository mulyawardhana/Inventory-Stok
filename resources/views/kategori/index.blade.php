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
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Kategori</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $i => $k)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$k->nama_kategori}}</td>
                        <td><a href="{{route('kategori.edit', $k->id)}}" class="btn btn-primary btn-sm ml-2">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="{{route('kategori.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Kategori</label>
            <input type="text" name="nama_kategori" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection