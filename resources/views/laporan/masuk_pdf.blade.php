
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
      <thead class="table-success">
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
      
        @foreach ($laporans as $i => $u)
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
            <th>Rp. {{number_format($laporans->sum('total_harga'),0,',','.')}}</th>
        </tr>

</table>
</body>
</html>