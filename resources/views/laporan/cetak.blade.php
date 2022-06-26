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
        <tr align="center">
            <td>
                <h4>Laporan Jurnal Umum</h4>
                <h6>Tanggal Jurnal : {{ $jurnal->tgl_jurnal }}</h6>
                <h6>Nomor Jurnal : {{ $jurnal->no_jurnal }}</h6>
            </td>
        </tr>
    </table>
    <table class="table" width="100%" align="center">
        <thead class="thead-light">
            <tr>
                <th width="10%">Tanggal Jurnal</th>
                <th width="10%">Nomor Pemesanan</th>
                <th width="5%">Kode Akun</th>
                <th width="7%">Nama Akun</th>
                <th width="5%">Debet</th>
                <th width="5%">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($laporan as $bb)
                <tr>
                    <td>{{ $bb->tgl_psn }}</td>
                    <td>{{ $bb->no_psn }}</td>
                    <td>{{ $bb->kd_akun }}</td>
                    <td>{{ $bb->nm_akun }}</td>
                    <td>{{ number_format($bb->debet) }}</td>
                    <td>{{ number_format($bb->kredit) }}</td>
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
