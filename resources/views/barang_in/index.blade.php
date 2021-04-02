@extends('layouts.master')
@section('content')
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<title>Data Barang Masuk | MWD</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
    	 	@if( Session::get('pesan') !="")
            <div class='alert alert-success'><center><b>{{Session::get('pesan')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Barang</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Beli</th>
                        <th>Supplier</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangIn as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->created_at->format('d,M Y')}}</td>
                        <td>{{$u->supplier->nama_supplier}}</td>
                        <td>{{$u->barang->nama_barang}}</td>
                        <td>Rp. {{number_format($u->harga_beli,0,',','.')}}</td>
                        <td>{{$u->jumlah}}</td>
                        <td>Rp. {{number_format($u->total_harga,0,',','.')}}</td>
                        <td><a href="{{route('barangIn.edit', $u->id)}}" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i></a></td>
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
    <form action="{{route('barangIn.store')}}" method="post">
        @csrf
        <div class="form group">
            <label>supplier</label>
                <select class="form-control" name="supplier_id">
                    <option value="" holder>--Pilih Supplier--</option>
                    @foreach($supplier as $k)
                        <option value="{{$k->id}}">{{$k->nama_supplier}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form group">
            <label>Barang</label>
                <select class="form-control" name="barang_id">
                    <option value="" holder>--Pilih Barang--</option>
                    @foreach($barang as $k)
                        <option value="{{$k->id}}">{{$k->nama_barang}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
            <label for="">Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" name="jumlah" class="form-control">
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

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
@endsection