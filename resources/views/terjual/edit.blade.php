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
			<form action="{{route('terjual.update', $terjual->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="inv">No Inv</label>
					<input type="text" name="inv" class="form-control" value="{{$terjual->inv}}">
				</div>
				<div class="form-group">
					<label for="">Nama Barang</label>
					<select class="form-control" name="barang_id">
						@foreach($barang as $j)
							@if($terjual->barang_id == $j->id)
							<option value="{{$j->id}}" selected>{{$j->nama_barang}}</option>
							@else
							<option value="{{$j->id}}">{{$j->nama_barang}}</option>
                    @endif
                    @endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="qty">qty</label>
					<input type="text" name="qty" class="form-control" value="{{$terjual->qty}}">
				</div>
				<div class="form-group">
					<label for="lokasi">lokasi</label>
					<input type="text" name="lokasi" class="form-control" value="{{$terjual->lokasi}}">
				</div>
				<div class="form-group">
					<label for="harga_jual">Harga Beli</label>
					<input type="text" name="harga_jual" class="form-control" value="{{$terjual->barang->harga_jual}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/terjual" class="btn btn-warning">Batal</a>
				</div>

			</form>
		</div>
	</div>
@endsection