<!DOCTYPE html>
<html>

<head>
    <title>Laporan Buku Besar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <table class="table table-borderless" width="100%" align="center">
        <tr>
            <td align="center">
                <h5>Laporan Penjualan<br>PT. Hee Jung</h5>
            </td>
        </tr>
    </table>
    <table class="table" width="100%" align="center">
        <thead>
            <tr>
                <th width="10%">Nomor Pemesanan</th>
                <th width="15%">Nama Customer</th>
                <th width="5%">Kode Barang</th>
                <th width="5%">Nama Barang</th>
                <th width="5%">Qty Barang</th>
                <th width="5%">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($detail as $bb)
                <tr>
                    <td>{{ $bb->no_psn }}</td>
                    <td>{{ $bb->nm_cust }}</td>
                    <td>{{ $bb->kd_brg }}</td>
                    <td>{{ $bb->nm_brg }}</td>
                    <td>{{ $bb->qty_pesan }}</td>
                    <td>{{ number_format($bb->sub_total) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br><br>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ ucfirst(trans(Auth::user()->name)) }}</h6>
    </div>
</body>

</html>
