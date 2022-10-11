<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                @foreach ($pemesanan as $pesan)
                                    <br>
                                    <img src="asset/img/hji.jpeg" width="80px">
                                    <br>
                                    <br>
                                    <strong>PENGIRIM</strong><br>
                                    PT HEE JUNG JAWA BARAT<br>
                                    021-689788<br>
                                    Landbouw Industrial Estate <br>
                                    Citereup, Kabupaten Bogor<br>
                                    Jawa Barat
                                    <br> <br><strong>PENERIMA :</strong><br>
                                    {{ $pesan->nm_cust }}
                            </td>
                            @endforeach
                            <td class="title">
                                <p style="font-size:15px;">
                                    Invoice : <strong>#{{ $no_psn }}</strong><br>
                                </p>
                            </td>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Item</td>
                <td>Subtotal</td>
            </tr>
            @php($total = 0)
            @foreach ($tampil as $row)
                <tr class="item">
                    <td>
                        {{ $row->nm_brg }}<br>
                        <strong>Harga</strong>: Rp {{ number_format($row->sub_total / $row->qty_pesan) }} x
                        {{ $row->qty_pesan }}
                    </td>
                    <td>Rp {{ number_format($row->sub_total) }}</td>
                </tr>
                @php($total += $row->sub_total)
            @endforeach
            <tr class="total">
                <td></td>
                <td>
                    Total: Rp {{ number_format($total) }}
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
