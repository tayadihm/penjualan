@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Customer</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#exampleModalScrollable">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </button>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Nama Pelanggan</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $cust)
                            <tr>
                                <td>{{ $cust->idcust }}</td>
                                <td>{{ $cust->nm_cust }}</td>
                                <td>{{ $cust->nohp }}</td>
                                <td>{{ $cust->email }}</td>
                                <td>{{ $cust->alamat }}</td>
                                <td align="center"><a
                                        href="{{ route('customer.edit', [$cust->idcust]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                    <a href="/customer/hapus/{{ $cust->idcust }}"
                                        onclick="retur n confirm('Ingin menghapus data?')"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form name="frm_add" id="frm_add" class="form-horizontal" action="#" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Id Customer</label>
                            <input type="text" name="addidcust" id="addidcust" class="form-control" maxlegth="5"
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Customer</label>
                            <input type="text" name="addnmcust" id="addnmcust" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No Handphone</label>
                            <input type="number" name="addnohp" id="nohp" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="addemail" id="addemail" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Alamat</label>
                            <input type="text" name="addalamat" id="addalamat" class="form-control"
                                id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
