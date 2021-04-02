@extends('layouts.master')
@section('content')
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<title>Data Kategori | MWD</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
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
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Size</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->kode_barang}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>{{$u->kategori->nama_kategori}}</td>
                        <td><img src="{{asset('/images/' . $u->gambar)}}" class="img-thumbnail" alt="Responsive image" width="100px"></td>
                        <td>{{$u->size}}</td>
                        <td>{{$u->stok}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    
$(document).ready( function () {
  var table = $('#dataTable').DataTable( {
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
  } )
} );
</script>
@endsection