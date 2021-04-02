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
			<form action="{{route('barangIn.update', $barangIn->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="">Nama Barang</label>
					<select class="form-control" name="barang_id">
						@foreach($barang as $j)
							@if($barangIn->barang_id == $j->id)
							<option value="{{$j->id}}" selected>{{$j->nama_barang}}</option>
							@else
							<option value="{{$j->id}}">{{$j->nama_barang}}</option>
                    @endif
                    @endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Nama Supplier</label>
					<select class="form-control" name="supplier_id">
						@foreach($supplier as $j)
							@if($barangIn->supplier_id == $j->id)
							<option value="{{$j->id}}" selected>{{$j->nama_supplier}}</option>
							@else
							<option value="{{$j->id}}">{{$j->nama_supplier}}</option>
                    @endif
                    @endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="nama_barang">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" value="{{$barangIn->barang->nama_barang}}">
				</div>
				<div class="form-group">
					<label for="jumlah">Jumlah</label>
					<input type="text" name="jumlah" class="form-control" value="{{$barangIn->jumlah}}">
				</div>
				<div class="form-group">
					<label for="harga_beli">Harga Beli</label>
					<input type="text" name="harga_beli" class="form-control" value="{{$barangIn->harga_beli}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/barangIn" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection