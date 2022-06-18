@extends('layouts.layout')
@section('content')
    <form action="{{ route('akun.update', [$akun->kd_akun]) }}" method="POST">@csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Rubah Form Data Akun</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="addkdakun">Kode Akun</label>
                    <input id="addkdakun" type="text" name="addkdakun" class="form-control" value="{{ $akun->kd_akun }}">
                </div>
                <div class="col-md-5">
                    <label for="addnmakun">Nama Akun</label>
                    <input id="addnmakun" type="text" name="addnmakun" class="form-control"
                        value="{{ $akun->nm_akun }}">
                </div>
            </div>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Update">
                <a href="{{ route('akun.index') }}"><input type="Button" class="btn btn-primary btn-send"
                        value="Kembali"></a>
            </div>
            <hr>
        </fieldset>
    </form>
@endsection
