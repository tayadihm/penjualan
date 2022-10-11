<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Customer;
use App\Barang;
use App\Pengiriman;
use App\Pemesanan;
use App\Temp_pengiriman;
use Alert;
use PDF;
use DB;

class PengirimanController extends Controller
{
    public function index()
    {
        $customer['data'] = Customer::orderby("nm_cust","ASC")
        ->select('nm_cust','alamat')
        ->get();
        $pemesanan['data'] = Pemesanan::orderby("nm_cust","ASC")
        ->select('nm_cust','no_psn')
        ->get();
        $barang = \App\Barang::All();
        // $temp_kirim = Temp_pengiriman::All();
        
        //No otomatis untuk transaksi pengiriman
        $AWAL = 'DLV';
        $bulanRomawi = array("", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
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

    public function getNoPsnAndCustomer(Request $request) 
    {
        $nm_id = $request->id;
    
        $custData = Customer::orderby("nm_cust","ASC")
            ->select('nm_cust','alamat')
            ->where('nm_cust',$nm_id)
            ->get();
    
        $noPsnData = Pemesanan::orderby("nm_cust","ASC")
        ->select('nm_cust','no_psn')
        ->where('nm_cust',$nm_id)
        ->get();
    
        return response()->json(["nm_psn" => $noPsnData, "nm_cust"  => $custData]);
    }

    // public function getCustomer($nm_cust="")
    // {
    //     $custData['data'] = Customer::orderby("nm_cust","ASC")
    //     ->select('nm_cust','alamat')
    //     ->where('nm_cust',$nm_cust)
    //     ->get();

    //     return response()->json($custData);
    // }

    // public function getNoPsn($nm_cust="")
    // {
    //     $noPsnData['data'] = Pemesanan::orderby("nm_cust","ASC")
    //     ->select('nm_cust','no_psn')
    //     ->where('nm_cust',$nm_cust)
    //     ->get();

    //     return response()->json($noPsnData);
    // }

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

    public function pdf(Request $request, $no_kirim)
    {
        $decrypted = Crypt::decryptString($no_kirim);
        $customer = DB::table('customer')->get();
        $tampil = DB::table('detail_pesan')->where('no_psn',$request->no_psn)->get();
        $pengiriman = DB::table('pengiriman')->where('no_kirim',$decrypted)->get();
        $pdf = PDF::loadView('laporan.cetakkirim',[
            'pengiriman'=>$pengiriman,
            'customer'=>$customer,
            'no_kirim'=>$decrypted, 
            'tampil'=>$tampil
        ]);
        return $pdf->stream();
    }

    public function destroy($id)
    {
        $decrypted = Crypt::decryptString($id);
        $pengiriman = DB::table('pengiriman')
            ->where('no_kirim',$decrypted)
            ->delete();
        Alert::success('Data berhasil dihapus');
        return redirect('/pengiriman');
    }
}
