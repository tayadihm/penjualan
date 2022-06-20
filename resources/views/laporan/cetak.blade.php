<!DOCTYPE html>
<html>

<head>
    <title>Laporan Buku Besar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/
css/bootstrap.min.css"
        integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="an
onymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h2>Laporan Jurnal<br>PT. Penjualan</h2>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="5%">Tanggal Transaksi</th>
                <th width="15%">Nama Akun/Perkiraan</th>
                <th width="5%">Debet</th>
                <th width="5%">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($laporan as $akn)
                <tr>
                    <td colspan="5">{{ $akn->tgl_jurnal }}</td>

                </tr>

                @foreach ($laporan as $bb)
                    @if ($akn->tgl_jurnal == $bb->tgl_jurnal)
                        <tr>
                            <td></td>
                            <td>{{ $bb->tgl_jurnal }}</td>
                            <td>{{ $bb->no_jurnal }} {{ $bb->keterangan }}</td>

                            <td>{{ number_format($bb->debet) }}</td>
                            <td>{{ number_format($bb->kredit) }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ Auth::user()->name }}</h6>
    </div>
</body>

</html>
