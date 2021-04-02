@extends('layouts.master')
@section('content')
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<title>Data Kategori | MWD</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jenis</h6>
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Jual</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Size</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->kode_barang}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>Rp. {{number_format($u->harga_jual,0,',','.')}}</td>
                        <td>{{$u->kategori->nama_kategori}}</td>
                        <td><img src="{{asset('/images/' . $u->gambar)}}" class="img-thumbnail" alt="Responsive image"></td>
                        <td>{{$u->size}}</td>
                        <td><a href="{{route('barang.edit', $u->id)}}" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i></a></td>
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
    <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{$kode_barang}}" readonly class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>
        <div class="form group">
            <label>Kategori</label>
                <select class="form-control" name="kategori_id">
                    <option value="" holder>--Pilih Kategori--</option>
                    @foreach($kategori as $k)
                        <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                    @endforeach
                </select>
                </div>
        <div class="form-group">
            <label>Size</label>
            <select class="form-control" name="size">
                <option value="" holder>--Pilih Size--</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Stok Barang</label>
            <input type="text" name="stok" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control">
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