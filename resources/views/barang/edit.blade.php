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
			<form action="{{route('barang.update', $barang->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="">Nama Barang</label>
					<select class="form-control" name="kategori_id">
						@foreach($kategori as $j)
							@if($barang->kategori_id == $j->id)
							<option value="{{$j->id}}" selected>{{$j->nama_kategori}}</option>
							@else
							<option value="{{$j->id}}">{{$j->nama_kategori}}</option>
                    @endif
                    @endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="kode_barang">Kode Barang</label>
					<input type="text" name="kode_barang" class="form-control" value="{{$barang->kode_barang}}" readonly>
				</div>
				<div class="form-group">
					<label for="nama_barang">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" value="{{$barang->nama_barang}}">
				</div>
				<div class="form-group">
					<label for="harga_jual">Harga Jual</label>
					<input type="text" name="harga_jual" class="form-control" value="{{$barang->harga_jual}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/barang" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection