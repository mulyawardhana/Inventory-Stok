@extends('layouts.master')
@section('content')
	<div class="card">
		<div class="card-header"><h4>Tambah Master</h4></div>
		<div class="card-body">
			@if(count($errors) > 0)
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			@endif
			<form action="{{route('stok.update', $stok->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<select name="kategori_id" class="form-control">
						@foreach($kategori as $k)
						@if($stok->kategori_id == $k->id)
						<option value="{{$k->id}}" selected>{{$k->nama_kategori}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="nama_barang">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" value="{{$stok->nama_barang}}">
				</div>
				<div class="form-group">
					<label for="kode_barang">Kode Barang</label>
					<input type="text" name="kode_barang" class="form-control" value="{{$stok->kode_barang}}">
				</div>
				 <div class="form-group">
		            <label for="">Harga Barang</label>
		            <input type="text" name="harga_barang" class="form-control" value="{{$stok->harga_barang}}">
		        </div>
		        <div class="form-group">
		            <label for="">Harga Jual</label>
		            <input type="text" name="harga_jual" class="form-control" value="{{$stok->harga_jual}}">
		        </div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/stok" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection