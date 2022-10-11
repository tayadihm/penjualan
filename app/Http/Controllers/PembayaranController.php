<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Pemesanan;
use App\Pembayaran;
use App\DetailBayar;
use App\Jurnal;
use DB;
use Alert;
use PDF;

class PembayaranController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::orderBy('no_psn', 'Desc')->paginate(10);

        return view('pembayaran.pembayaran',compact('pemesanan'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pemesanan = DB::table('pemesanan')
                    ->where('no_psn','like',"%".$cari."%")
                    ->paginate();

        return view('pembayaran.pembayaran',compact('pemesanan'));
    }

    public function edit($id)
    {
        $AWAL = 'FKT';
        $bulanRomawi = array("", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
        $noUrutAkhir = Pembayaran::max('no_bayar'); 
        $no = 1; 
        $format=sprintf("%03s", abs((int)$noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');

        $AWALJurnal = 'JRU'; 
        $bulanRomawij = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII"); 
        $noUrutAkhirj = Jurnal::max('no_jurnal'); 
        $noj = 1; 
        $formatj=sprintf("%03s", abs((int)$noUrutAkhirj + 1)). '/' . $AWALJurnal .'/' . $bulanRomawij[date('n')] .'/' . date('Y');

        $decrypted = Crypt::decryptString($id); 
        $detail = DB::table('tampil_pemesanan')->where('no_pesan',$decrypted)->get(); 
        $pemesanan = DB::table('pemesanan')->where('no_psn',$decrypted)->get(); 
        $akunkas = DB::table('setting')->where('nama_transaksi','Kas')->get(); 
        $akunpembayaran = DB::table('setting')->where('nama_transaksi','Piutang Usaha')->get(); 

        return view('pembayaran.bayar',[
            'detail'=>$detail,
            'format'=>$format,
            'no_psn'=>$decrypted,
            'pemesanan'=>$pemesanan,
            'formatj'=>$formatj,
            'kas'=>$akunkas,
            'pembayaran'=>$akunpembayaran
        ]);
    }

    public function store(Request $request)
    {
    
        $validator = \Validator::make($request->all(), [
            'no_pesan' => 'required|unique:pembayaran,no_psn'
        ]);

        if ($validator->fails()) {
            return redirect('pembayaran')->with(['error' => 'Gagal, Data Sudah Pernah Diinput!'])->withErrors($validator->errors());
        } else {
            //Simpan ke table pembayaran
            $pembayaran = new Pembayaran;
            $pembayaran->no_bayar = $request->no_faktur;
            $pembayaran->tgl_bayar = $request->tgl_bayar;
            $pembayaran->no_psn = $request->no_pesan;
            $pembayaran->tgl_psn = $request->tgl_psn;
            $pembayaran->jml_bayar = $request->total;
            $pembayaran->save();
            

            //SIMPAN DATA KE TABEL DETAIL PEMBAYARAN 
            $kd_brg = $request->kd_brg;
            $qty_bayar = $request->qty_bayar; 
            $sub_bayar = $request->sub_bayar;
            foreach($kd_brg as $key => $no)
             {
                 $input['no_bayar'] = $request->no_faktur; 
                 $input['kd_brg'] = $kd_brg[$key]; 
                 $input['qty_bayar'] = $qty_bayar[$key];
                 $input['sub_bayar'] = $sub_bayar[$key];
                 DetailBayar::insert($input); 
                }
            
            $jurnaldebet = [
                'no_jurnal' => $request->no_jurnal,
                'tgl_bayar' => $request->tgl_bayar,
                'no_psn' => $request->no_pesan,
                'tgl_psn' => $request->tgl_psn,
                'kd_akun' => $request->pembayaran,
                'nm_akun' => 'Kas',
                'debet' => $request->total,
                'kredit' => '0',
            ];

            Jurnal::insert($jurnaldebet);

            $jurnalkredit = [
                'no_jurnal' => $request->no_jurnal,
                'tgl_bayar' => $request->tgl_bayar,
                'no_psn' => $request->no_pesan,
                'tgl_psn' => $request->tgl_psn,
                'kd_akun' => $request->kas,
                'nm_akun' => 'Piutang Usaha',
                'kredit' => $request->total,
                'debet' => '0',
            ];

            Jurnal::insert($jurnalkredit);
            Alert::success('Pesan ','Data berhasil disimpan'); 
            
            return redirect('/pembayaran');
        }
    }

    public function destroy($id)
    {
        $decrypted = Crypt::decryptString($id);
        $pemesanan = DB::table('pemesanan')
            ->where('no_psn',$decrypted)
            ->delete();
        Alert::success('Data berhasil dihapus');
        return redirect('/pembayaran');
    }
}
