<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPesan;
use App\Pemesanan;
use App\Temp_Pemesanan;
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
        //Simpan ke table pemesanan
       $tambah_pemesanan=new \App\Pemesanan;
       $tambah_pemesanan->no_psn = $request->no_psn;
       $tambah_pemesanan->tgl_psn = $request->tgl_psn ;
       $tambah_pemesanan->nm_cust = $request->nm_cust;
       $tambah_pemesanan->total = $request->total;
       $tambah_pemesanan->tgl_tempo  = $request->tgl_tempo;
       $tambah_pemesanan->save();
       //SIMPAN DATA KE TABEL DETAIL
       
       $no_psn = $request->no_psn;
       $kd_brg = $request->kd_brg;
       $nm_brg = $request->nm_brg;
       $qty_pesan = $request->qty_pesan;
       $sub_total = $request->sub_total;
       foreach($kd_brg as $key => $no)
       {
           $input['no_psn'] = $request->no_psn;
           $input['kd_brg'] = $kd_brg[$key];
           $input['nm_brg'] = $nm_brg[$key];
           $input['qty_pesan'] = $qty_pesan[$key];
           $input['sub_total'] = $sub_total[$key];
           DetailPesan::insert($input);
          
       }
       Alert::success('Data berhasil disimpan');
       return redirect('/transaksi'); 
   }
   
   public function simpan(Request $request)
   {
      
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
