<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Laporan;
use App\Customer;
use App\Pemesanan;
use App\DetailPesan;
use App\Jurnal;
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
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');
            $bb = \App\Jurnal::All();
            $jurnal = Jurnal::first();
            $akun = \App\Akun::All();
            $pdf = PDF::loadview('laporan.cetak', ['tglawal' => $tglawal,'tglakhir' => $tglakhir, 'laporan' => $bb, 'akun' => $akun, 'jurnal' => $jurnal])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');
            $jurnal = Jurnal::first();
            $akun = \App\Akun::All();
            $bb = DB::table('jurnal')
                ->whereBetween('tgl_bayar', [$tglawal, $tglakhir])
                ->orderby('tgl_bayar', 'ASC')
                ->get();

            $pdf = PDF::loadview('laporan.cetak-jurnal-periode', [
                'laporan' => $bb,
                'akun' => $akun,
                'jurnal' => $jurnal,
                'tglawal' => $tglawal,
                'tglakhir' => $tglakhir
                ])->setPaper('A4', 'landscape');
            return $pdf->stream();
        }
    }

    public function reportPenjualan()
    {
        return view('laporan.laporan-penjualan');
    }

    public function cetakPenjualan(Request $request)
   {
        $periode = $request->get('periode');
        if ($periode == 'All') {
            $pemesanan = Pemesanan::all();
            $detail = DetailPesan::all();
            $customer = Customer::all();
            $pdf = PDF::loadView('laporan.cetak-penjualan', [
                    'detail'=>$detail,
                    'laporan'=>$pemesanan,
                    'customer'=>$customer
                ]);
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');
            $detail = DB::table('detail_pesan')
                        ->whereBetween('tgl_psn', [$tglawal, $tglakhir])
                        ->orderBy('tgl_psn','ASC')
                        ->get();

            $pdf = PDF::loadView('laporan.cetak-penjualan', [
                'detail' => $detail,
                'tglawal' => $tglawal,
                'tglakhir' => $tglakhir
            ])->setPaper('A4','landscape');
        return $pdf->stream();
        }

    }
}
