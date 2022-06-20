@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pembayaran</h1>
    </div>

    <form action="" method="POST">
        @csrf
        <div class="card-header py-3" align="right">
            <input type="search">
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#exampleModalScrollable">
                <i class="fas fa-plus fa-sm text-white-50"></i>Cari
            </button>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No Pemesanan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $pesan)
                                <tr>
                                    {{-- <td colspan="3"></td>
                                <td><input name="total" class="form-control" type="hidden" value=""></a> --}}
                                    <td>{{ $pesan->no_psn }}</td>
                                    <td>{{ $pesan->tgl_psn }}</td>
                                    <td>{{ $pesan->tgl_tempo }}</td>
                                    <td>
                                        <a href="{{ url('/pembayaran/bayar/' . Crypt::encryptString($pesan->no_psn)) }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Bayar</a>
                                        <a href="/pembayaran/hapus/{{ $pesan->no_psn }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="form-group col-sm-4">
                    <label for="exampleFormControlInput1">No Pesanan</label>

                    <input type="text" name="no_psn" value="" class="form-control" id="exampleFormControlInput1">
                    <input type="hidden" name="no_jurnal" value="" class="form-control"
                        id="exampleFormControlInput1">

                </div>
                <div class="form-group col-sm-4">
                    <label for="exampleFormControlInput1">Tanggal Pesan</label>
                    <input type="date" min="1" name="tgl" id="addnmbrg" class="form-control"
                        id="exampleFormControlInput1" require>
                </div>

                <div class="form-group col-sm-4">
                    <label for="exampleFormControlInput1">Tanggal Pesan</label>
                    <input type="date" min="1" name="tgl" id="addnmbrg" class="form-control"
                        id="exampleFormControlInput1" require>
                </div>
                <div class="form-group col-sm-4">
                    <label for="exampleFormControlInput1">Customer</label>
                    <select name="cust" id="cust select2" class="form-control" required width="100%">
                        <option value="">Pilih</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-send" value="Simpan"> --}}

                {{-- <div class="card card-info">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No Pesanan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="inputPassword3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Bayar</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kembali</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                </div>
                            </div>

                        </div>

                        <form class="form-horizontal">
                            <div class="card-body">
                                <td align="center">
                                    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>Simpan
                                    </a>
                                </td>
                            </div>
                        </form>
                    </form>
                </div> --}}
            </div>
        </div>

        </div>
    </form>
@endsection
