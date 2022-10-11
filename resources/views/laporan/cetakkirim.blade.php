<html>

<head>
    <meta charset="utf-8">
    <title>Delivery Order </title>

    <style>
        .invoice-box {
            max-width: 100%;
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
            table-layout: fixed;
            width: 100%;
            max-width: 100%;
            border: 3px solid brown;
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
                            <td class="title">
                                <img src="asset/img/hji.jpeg" width="80px">
                            </td>

                            <td>
                                Delivery Order : <strong>#{{ $no_kirim }}</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                @foreach ($pengiriman as $kirim)
                                    @foreach ($customer as $cust)
                                        @if ($kirim->nm_cust == $cust->nm_cust) 
                                            <strong>PENGIRIM</strong><br>
                                            PT HEE JUNG JAWA BARAT<br> 
                                            021-689788<br>
                                            Landbouw Industrial Estate <br>
                                            Citereup, Kabupaten Bogor<br>
                                            Jawa Barat
                                            <br> <br> <strong>NAMA DRIVER :</strong><br>
                                            {{ $kirim->driver }}
                            </td>
                            <td>
                                <strong>PENERIMA</strong><br>
                                {{ $cust->nm_cust }}<br>
                                {{ $cust->nohp }}<br>
                                {{ $cust->alamat }}<br>
                                @endif 
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="2">Deskripsi</td>
            </tr>
            <tr>
                <td>Nomor Pemesanan : {{ $kirim->no_psn }} </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
