<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPesan;
use App\Pemesanan;
use Alert;
use DB;
use PDF;
class DetailPesanController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
      
      
      
   }
   public function simpan(Request $request)
   {
       //Simpan ke table pemesanan
       $tambah_pemesanan=new \App\Pemesanan;
       $tambah_pemesanan->no_psn = $request->no_psn;
       $tambah_pemesanan->tgl_psn = $request->tgl_psn ;
       $tambah_pemesanan->nm_cust = $request->nm_cust;
       $tambah_pemesanan->total = $request->total;
       $tambah_pemesanan->tgl_tempo  = $request->tgltem;
       $tambah_pemesanan->save();
       //SIMPAN DATA KE TABEL DETAIL
       $no_psn = $request->no_psn;
       $kd_brg = $request->kd_brg;
       $qty= $request->qty_psn;
       $subtot= $request->subtot;
       foreach($kd_brg as $key => $no)
       {
           $input['no_psn'] = $request->no_psn;
           $input['kd_brg'] = $kd_brg[$key];
           $input['qty_psn'] = $qty[$key];
           $input['subtot'] = $subtot[$key];
           DetailPesan::insert($input);
          
       }
       Alert::success('Pesan ','Data berhasil disimpan');
       return redirect('/transaksi');
     
      
   }


   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
      
   }
}
