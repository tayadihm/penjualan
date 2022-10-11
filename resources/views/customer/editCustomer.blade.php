@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('customer.update', [$customer->idcust]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Ubah Data customer</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="addidcust">Kode customer</label>
                    <input id="addidcust" class="form-control" type="text" name="addidcust" value="{{ $customer->idcust }}" readonly>
                </div>
                <div class="col-md-5">
                    <label for="addnmcust">Nama customer</label>
                    <input id="addnmcust" type="text" name="addnmcust" class="form-control" value="{{ $customer->nm_cust }}" readonly>
                </div>
                <div class="col-md-5">
                    <label for="addnohp">Nomor HP</label>
                    <input id="addnohp" type="text" name="addnohp" class="form-control" value="{{ $customer->nohp }}">
                </div>
                <div class="col-md-5">
                    <label for="addemail">Email</label>
                    <input id="addemail" type="text" name="addemail" class="form-control" value="{{ $customer->email }}">
                </div>
                <div class="col-md-5">
                    <label for="addalamat">Alamat</label>
                    <input id="addalamat" type="text" name="addalamat" class="form-control" value="{{ $customer->alamat }}">
                </div>


        </fieldset>
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <a href="{{ route('customer.index') }}"><input type="Button" class="btn btn-primary btn-send"
                    value="Kembali"></a>
        </div>
        <hr>
    </form>
@endsection
