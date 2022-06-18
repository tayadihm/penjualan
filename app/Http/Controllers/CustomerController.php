<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Alert;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=\App\Customer::All();
        return view('customer.customer',['customer'=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_customer=new \App\Customer;
        $tambah_customer->idcust = $request->addidcust;
        $tambah_customer->nm_cust = $request->addnmcust;
        $tambah_customer->nohp = $request->addnohp;
        $tambah_customer->email = $request->addemail;
        $tambah_customer->alamat = $request->addalamat;
        $tambah_customer->save();
        Alert::success('Data berhasil disimpan');
        return redirect()->route('customer.index');

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
        $customer = Customer::find($id);
        return view('customer.editCustomer', compact('customer'));
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
        $update_customer = \App\Customer::findOrFail($id);
        $update_customer->idcust=$request->get('addidcust');
        $update_customer->nm_cust=$request->get('addnmcust');
        $update_customer->nohp=$request->get('addnohp');
        $update_customer->email=$request->get('addemail');
        $update_customer->alamat=$request->get('addalamat');
        $update_customer->save();
        Alert::success('Update', 'Data Berhasil di update');
        return redirect()->route( 'customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $customer=\App\Customer::findOrFail($id);
        $customer->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('customer.index');

    }
}
