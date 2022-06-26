<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Barang;
use App\Pengiriman;
use App\Pemesanan;
use App\Temp_pengiriman;
use Alert;
use DB;

class PengirimanController extends Controller
{
    public function index()
    {
        $customer = \App\Customer::All();
        $barang = \App\Barang::All();
        $pemesanan = Pemesanan::All();
        // $temp_kirim = Temp_pengiriman::All();

        //No otomatis untuk transaksi pengiriman
        $AWAL = 'DLV';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = \App\Pengiriman::max('no_kirim');
        $no = 1;
        $no_kirim = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');

        $pengiriman = Pengiriman::orderBy('no_kirim', 'DESC')->paginate(5);

        return view('pengiriman.pengiriman',
            [
                'no_kirim' => $no_kirim,
                'customer' => $customer,
                'barang' => $barang,
                'pemesanan' => $pemesanan,
                // 'temp_kirim' => $temp_kirim,
                'pengiriman' => $pengiriman
            ]
        );
    }

    public function store(Request $request)
    {
        //Simpan ke table pemesanan
        $tambah_pengiriman=new \App\Pengiriman;
        $tambah_pengiriman->no_kirim = $request->no_kirim;
        $tambah_pengiriman->tgl_kirim = $request->tgl_kirim ;
        $tambah_pengiriman->no_psn = $request->no_psn ;
        $tambah_pengiriman->nm_cust = $request->nm_cust;
        $tambah_pengiriman->alamat = $request->alamat;
        $tambah_pengiriman->driver  = $request->driver;
        $tambah_pengiriman->save();
        Alert::success('Pesan ','Data berhasil disimpan'); 
        return redirect('pengiriman');
    }
}
