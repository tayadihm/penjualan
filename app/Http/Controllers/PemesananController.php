<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Customer;
use App\Pemesanan;
use App\Temp_pemesanan;
use App\Temp_pesan;
use Alert;

class PemesananController extends Controller
{
    public function index()
    {
        $akun = \App\Akun::All();
        $barang = \App\Barang::All();
        $customer = \App\Customer::All();
        $temp_pesan = \App\Temp_pesan::All();
        //No otomatis untuk transaksi pemesanan
        $AWAL = 'TRX';
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = \App\Pemesanan::max('no_psn');
        $no = 1;
        $formatnya = sprintf("%03s", abs((int)$noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        // No otomatis untuk jurnal
        // $AWALJurnal = 'JRU';
        // $bulanRomawij = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        // $noUrutAkhirj = \App\Jurnal::max('no_jurnal');
        // $noj = 1;
        // $formatnyaj=sprintf("%03s", abs((int)$noUrutAkhirj + 1)). '/' . $AWALJurnal .'/' . $bulanRomawij[date('n')] .'/' . date('Y');

        $tampil = Pemesanan::orderBy('no_psn', 'DESC')->paginate(5);

        return view(
            'pemesanan.pemesanan'
            ,
            [
                'barang' => $barang,
                'akun' => $akun,
                'customer' => $customer,
                'temp_pemesanan' => $temp_pesan,
                'formatnya' => $formatnya,
                'tampil' => $tampil
            ]
        );
    }

    public function tambahOrder()
    {
        return view('pemesanan');
    }

    public function store(Request $request)
    {
        //Validasi jika barang sudah ada pada tabel temporari maka QTY akan di edit
        
        if (Temp_pemesanan::where('kd_brg', $request->brg)->exists()) {
            Alert::warning('Barang sudah ada.. QTY akan terupdate ?');
            Temp_pemesanan::where('kd_brg', $request->brg)
                ->update(['qty_psn' => $request->qty_pesan]);
            return redirect('transaksi');
        } else {
            Temp_pemesanan::create([
                'qty_psn' => $request->qty_pesan,
                'kd_brg' => $request->brg
            ]);
            return redirect('transaksi');
        }
    }

    public function destroy($kd_brg)
    {
        $barang = \App\Temp_pemesanan::findOrFail($kd_brg);
        $barang->delete();
        // Alert::success('Pesan ', 'Data berhasil dihapus');
        return redirect('transaksi');
    }
}
