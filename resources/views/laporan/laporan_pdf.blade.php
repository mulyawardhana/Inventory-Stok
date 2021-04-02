
<!DOCTYPE html>
<html>
<head>
  <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center>
      <h4>Laporan Penjualan MWD</h4>
    </center>
    <table class='table table-sm table-bordered'>
       <thead class="table-warning">
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
      
        @foreach ($laporans as $i => $u)
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

</table>
</body>
</html>