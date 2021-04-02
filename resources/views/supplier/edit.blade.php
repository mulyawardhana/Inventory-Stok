@extends('layouts.master')
@section('content')
	<div class="card">
		<div class="card-header"><h4>Tambah Supplier</h4></div>
		<div class="card-body">
			@if(count($errors) > 0)
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			@endif
			<form action="{{route('supplier.update', $supplier->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="kode_supplier">Nama Departemen</label>
					<input type="text" name="kode_supplier" class="form-control" value="{{$supplier->kode_supplier}}">
				</div>
				<div class="form-group">
					<label for="nama_supplier">Nama Departemen</label>
					<input type="text" name="nama_supplier" class="form-control" value="{{$supplier->nama_supplier}}">
				</div>
				<div class="form-group">
					<label for="no_wa">Nomor WA</label>
					<input type="text" name="no_wa" class="form-control" value="{{$supplier->no_wa}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/supplier" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection