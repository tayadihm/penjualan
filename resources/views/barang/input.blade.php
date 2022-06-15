@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('akun.store')}}" method="POST">@csrf
 <fieldset><legend>Input Data Barang</legend>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="usname">Kode Barang</label>
 <input id="usname" type="text" name="kodebarang" class="form-control"required>
 </div>
 <div class="col-md-5">
 <label for="nama">Nama Barang</label>
 <input id="nama" type="text" name="nama" class="form-control"required>
 </div>
 <div class="col-md-5">
 <label for="qty">Qty</label>
 <input id="qty" type="number" name="qty" class="form-control"required>
 </div>
 <div class="col-md-5">
 <label for="satuan">Satuan</label>
 <input id="satuan" type="text" name="satuan" class="form-control"required>
 </div>
 <div class="col-md-5">
 <label for="harga">Harga</label>
 <input id="harga" type="number" name="harga" class="form-control"required>
 </div>
 </div>
 <div class="col-md-10">
 <input type="submit" class="btn btn-success btn-send" value="Simpan">
 <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
 </div>
 <hr>
 </fieldset>
</form>
@endsection