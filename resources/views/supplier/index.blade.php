@extends('layouts.master')

@section('content')
<title>Data Supplier | MWD</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jenis</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
    	 	@if( Session::get('pesan') !="")
            <div class='alert alert-success'><center><b>{{Session::get('pesan')}}</b></center></div>        
            @endif
            @if(count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Supplier</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>No Wa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supplier as $i => $k)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$k->kode_supplier}}</td>
                        <td>{{$k->nama_supplier}}</td>
                        <td>{{$k->no_wa}}</td>
                        <td><a href="{{route('supplier.edit', $k->id)}}" class="btn btn-primary btn-sm ml-2">Edit</a></td>
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
    <form action="{{route('supplier.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">kode Supplier</label>
            <input type="text" name="kode_supplier" class="form-control" value="{{$kode_supplier}}" readonly>
        </div>
        <div class="form-group">
            <label for="">Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control">
        </div>
        <div class="form-group">
            <label for="">No Wa</label>
            <input type="text" name="no_wa" class="form-control">
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