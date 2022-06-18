@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pengiriman</h1>
    </div>

    <form action="" method="POST">
        @csrf


        <div class="card card-info">

            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>

                        <div align="right">
                            <input type="search">
                            <label class="col-form-label">No Do</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Supir</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Order</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">No DO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Total Order</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No DO</th>
                                <th>Kode Barang</th>
                                <th>Jumlah Kirim</th>
                                <th>Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td colspan="3"></td>
                                <td><input name="total" class="form-control" type="hidden" value=""></a> --}}
                                <td>123</td>
                                <td>123</td>
                                <td>1234</td>
                                <td>124</td>
                            </tr>
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

                <form class="form-horizontal">
                    <div class="card-body">
                        <td align="center">
                            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-edit fa-sm text-white-50"></i>Simpan
                            </a>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i>Batal </a>
                        </td>
                    </div>
                </form>


            </div>
        </div>

        </div>
    </form>
@endsection
