<table id="dataTable" class="table table-bordered" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Qty</th>
                <th>Lokasi</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
      
        @foreach ($transaksi as $i => $u)
            <tr>
                <td>{{++$i}}</td>   
                <td>{{$u->barang->kode_barang}}</td>   
                <td>{{$u->barang->nama_barang}}</td>   
                <td>Rp. {{number_format($u->barang->harga_jual,0,',','.')}}</td>   
                <td>{{$u->qty}}</td>
                <td>{{$u->lokasi}}</td> 
                <td>Rp. {{number_format($u->total_harga,0,',','.')}}</td>   
            </tr>
        @endforeach
        </tbody>
        <tr>
            <th colspan="6">Total :</th>
            <th>Rp. {{number_format($transaksi->sum('total_harga'),0,',','.')}}</th>
        </tr>
     
</table>