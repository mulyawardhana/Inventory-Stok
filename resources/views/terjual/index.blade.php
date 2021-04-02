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
            @if( Session::get('pesan1') !="")
            <div class='alert alert-danger'><center><b>{{Session::get('pesan1')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Terjual</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Jual</th>
                        <th>No Inv</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terjual as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->created_at->format('d,M Y')}}</td>
                        <td>{{$u->inv}}</td>
                        <td>{{$u->barang->nama_barang}}</td>
                        <td>Rp. {{number_format($u->barang->harga_jual,0,',','.')}}</td>
                        <td>{{$u->qty}}</td>
                        <td>Rp. {{number_format($u->qty * $u->barang->harga_jual,0,',','.')}}</td>
                        <td>{{$u->lokasi}}</td>
                         <td><a href="{{route('terjual.edit', $u->id)}}" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i></a></td>
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
    <form action="{{route('terjual.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">No INV</label>
            <input type="text" name="inv" class="form-control" value="{{$inv}}" readonly>
        </div>
        <div class="form group">
             <label>Barang</label>
                <select class="form-control" name="barang_id" id="id">
                    <option value="" holder>--Pilih Barang--</option>
                    @foreach($barang as $k)
                        <option value="{{$k->id}}">{{$k->nama_barang}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" name="harga_jual" class="form-control" id="harga_jual" readonly>
        </div>
        <div class="form-group">
            <label for="">Stok</label>
            <input type="text" name="stok" class="form-control" id="stok" readonly>
        </div>
        <div class="form-group">
            <label for="">qty</label>
            <input type="text" name="qty" class="form-control">
        </div>
        <div class="form-group">
            <label for="">lokasi</label>
            <select name="lokasi" class="form-control" id="">
                        <option value="" disabled selected>Pilih Lokasi Penjualan</option>
                        <option value="BukaLapak">BukaLapak</option>
                        <option value="Shopee">Shopee</option>
                        <option value="Tokopedia">Tokopedia</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Lainya">Lainya</option>
                    </select>
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
<script type="text/javascript">
   
$('#id').change(function(){
    setInterval(function(){ 
    if($('#id').val()!=''){
        var id=$('#id').val();
        $.ajax({
           type:"GET",
           url:"{{url('ambil')}}?id="+id,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
                    $("#harga_jual").val(key);
                    $("#stok").val(value);
                });
            }else{
                $("#harga_jual").empty();
                $("#stok").empty();
            }
           }
        });
    }
}, 500);
});

$(document).ready( function () {
  var table = $('#dataTable').DataTable( {
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
  } )
} );

</script>
@endsection