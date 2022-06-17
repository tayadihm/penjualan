@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('barang.update', [$barang->kd_brg]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Ubah Data Barang</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="addkdbrg">Kode Barang</label>
                    <input class="form-control" type="text" name="addkdbrg" value="{{ $barang->kd_brg }}" readonly>
                </div>
                <div class="col-md-5">
                    <label for="addnmbrg">Nama Barang</label>
                    <input id="addnmbrg" type="text" name="addnmbrg" class="form-control"
                        value="{{ $barang->nm_brg }}">
                </div>
                <div class="col-md-5">
                    <label for="Qty">Qty</label>
                    <input id="addqty" type="text" name="addqty" class="form-control" value="{{ $barang->qty }}">
                </div>
                <div class="col-md-5">
                    <label for="Satuan">Satuan</label>
                    <input id="addsatuan" type="text" name="addsatuan" class="form-control"
                        value="{{ $barang->satuan }}">
                </div>
                <div class="col-md-5">
                    <label for="Harga">Harga</label>
                    <input id="addharga" type="text" name="addharga" class="form-control"
                        value="{{ $barang->harga }}">
                </div>


        </fieldset>
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <a href="{{ route('barang.index') }}"><input type="Button" class="btn btn-primary btn-send"
                    value="Kembali"></a>
        </div>
        <hr>
    </form>
@endsection
