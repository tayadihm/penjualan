<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use Alert;
class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Akun::All();
        return view('akun.akun',['akun'=>$akun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.input');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menyimpan data
        $tambah_akun=new \App\Akun;
        $tambah_akun->kd_akun = $request->addkdakun;
        $tambah_akun->nm_akun = $request->addnmakun;
        $tambah_akun->save(); // method
        Alert::success('Pesan ','Data berhasil disimpan'); //anak dari alert //success atau gagal disebut polymorpy
        return redirect('/akun'); // prosedur
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
        $akun = Akun::find($id);
        return view('akun.edit', compact('akun'));
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
        $akun = \App\Akun::findOrFail($id);
        $akun->kd_akun=$request->get('addkdakun');
        $akun->nm_akun=$request->get('addnmakun');
        $akun->save();
        Alert::success('Update', 'Data Berhasil di update');
        return redirect()->route( 'akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();
        Alert::success('Data Berhasil di Hapus');
        return redirect()->route('akun.index');
    }
}
