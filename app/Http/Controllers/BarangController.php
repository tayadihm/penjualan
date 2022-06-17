<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Alert;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang=Barang::All();
        return view('barang.barang',['barang'=>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_barang=new Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->qty = $request->addqty;
        $tambah_barang->satuan = $request->addsatuan;
        $tambah_barang->harga = $request->addharga;
        $tambah_barang->save();
        Alert::success('Data berhasil disimpan');
        return redirect()->route('barang.index');

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
        $barang = Barang::find($id);
        return view('barang.editBarang', compact('barang'));
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
        $update_barang = Barang::findOrFail($id);
        $update_barang->kd_brg=$request->get('addkdbrg');
        $update_barang->nm_brg=$request->get('addnmbrg');
        $update_barang->qty=$request->get('addqty');
        $update_barang->satuan=$request->get('addsatuan');
        $update_barang->harga=$request->get('addharga');
        $update_barang->save();
        Alert::success('Update', 'Data Berhasil di update');
        return redirect()->route( 'barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_brg)
    {
        $barang=Barang::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('barang.index');

    }
}
