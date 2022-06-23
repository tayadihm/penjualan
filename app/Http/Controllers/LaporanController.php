<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Customer;
use App\Pemesanan;
use App\DetailPesan;
use PDF;
use DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.laporan');
    }

    public function show(Request $request)
    {
        $periode = $request->get('periode');
        if ($periode == 'All') {
            $bb = \App\Laporan::All();
            $akun = \App\Akun::All();
            $pdf = PDF::loadview('laporan.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');
            $akun = \App\Akun::All();
            $bb = DB::table('jurnal')
                ->whereBetween('tgl_jurnal', [$tglawal, $tglakhir])
                ->orderby('tgl_jurnal', 'ASC')
                ->get();

            $pdf = PDF::loadview('laporan.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        }
    }

    public function reportPenjualan() 
    {
        $pemesanan = Pemesanan::all();
        $detail = DetailPesan::all();
        // dd($customer);
        return view('laporan.laporan-penjualan',compact('pemesanan','detail'));
    }

    // public function printPenjualan($id) {
    //     $decrypted = Crypt::decryptString($id); 
    //     $customer = Customer::all();
    //     $supplier = DB::table('supplier')->get(); 
    //     $pemesanan = DB::table('pemesanan')->where('no_pesan',$decrypted)
    //                 ->get(); 
    //     $pdf = PDF::loadView('laporan.faktur',
    //                 ['detail'=>$detail,
    //                 'order'=>$pemesanan,
    //                 'supp'=>$supplier,
    //                 'noorder'=>$decrypted]);
    //      return $pdf->stream();
    // }
}
