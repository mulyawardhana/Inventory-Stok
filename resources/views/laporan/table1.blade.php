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
            </tr>
        </thead>
        <tbody>
      
        @foreach ($transaksi as $i => $u)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$u->created_at}}</td>   
                <td>{{$u->supplier->nama_supplier}}</td>   
                <td>{{$u->barang->nama_barang}}</td>   
                <td>Rp. {{number_format($u->harga_beli,0,',','.')}}</td>   
                <td>{{$u->jumlah}}</td>
                <td>Rp. {{number_format($u->total_harga,0,',','.')}}</td>   
            </tr>
        @endforeach
        </tbody>
         <tr>
            <th colspan="6">Total :</th>
            <th>Rp. {{number_format($transaksi->sum('total_harga'),0,',','.')}}</th>
        </tr>
</table>