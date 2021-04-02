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
			<form action="{{route('kategori.update', $kategori->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="nama_kategori">Nama Departemen</label>
					<input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/kategori" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection