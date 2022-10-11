@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Beranda') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('PT Hee Jung Jawa Barat mensupplai beberapa industri yang berhubungan dengan keramik, seperti produsen wall atau floor tiles, roof tile, sanitary wares dan table wares.
                        PT Hee Jung Jawa Barat memiliki kemampuan dan potensi untuk menyediakan permintaan yang cukup dari pelanggan.') }} <br> <br>
                        <div class="row justify-content-center">
                        <br> <br> <img width="400px" height="400px" class="img-profile rounded-square" src="{{ asset('asset/img/hjc.jpeg') }}">
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
