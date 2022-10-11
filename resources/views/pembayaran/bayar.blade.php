@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-gray-800">Pembayaran</h3>
    </div>
    <hr>
    <form action="/pembayaran/store" method="POST">
        @csrf
        <div class="form-group col-sm-4">
            <label for="exampleFormControlInput1">No Pembayaran</label>
            @foreach ($kas as $ks)
                <input type="hidden" name="kas" value="{{ $ks->kd_akun }}" class="form-control"
                    id="exampleFormControlInput1">
            @endforeach
            @foreach ($pembayaran as $byr)
                <input type="hidden" name="pembayaran" value="{{ $byr->kd_akun }}" class="form-control"
                    id="exampleFormControlInput1">
            @endforeach
            <input type="hidden" name="no_jurnal" value="{{ $formatj }}" class="form-control"
                id="exampleFormControlInput1">
            <input type="text" name="no_faktur" value="{{ $format }}" class="form-control"
                id="exampleFormControlInput1" readonly>
        </div>
        @foreach ($pemesanan as $psn)
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">No Pemesanan</label>
                <input type="text" name="no_pesan" value="{{ $psn->no_psn }}" class="form-control"
                    id="exampleFormControlInput1" readonly>
            </div>
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Tanggal Pemesanan</label>
                <input type="text" min="1" name="tgl_psn" id="tgl_psn" class="form-control"
                    id="exampleFormControlInput1" value="{{ $psn->tgl_psn }}" required readonly>
            </div>
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Tanggal Jatuh Tempo</label>
                <input type="text" min="1" name="tgl_tempo" id="tgl_tempo" class="form-control"
                    id="exampleFormControlInput1" value="{{ $psn->tgl_tempo }}" required readonly>
            </div>
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Tanggal Pembayaran</label>
                <input type="date" min="1" name="tgl_bayar" id="tgl_bayar" class="form-control"
                    id="exampleFormControlInput1" required>
            </div>
        @endforeach

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach ($detail as $temp)
                                <tr>
                                    <td><input name="no_bayar[]" class="form-control" type="hidden"
                                            value="{{ $temp->no_pesan }}" readonly>
                                        <input name="kd_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->kd_brg }}" readonly>{{ $temp->kd_brg }}
                                    </td>
                                    <td><input name="nm_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->nm_brg }}" readonly>{{ $temp->nm_brg }}</td>
                                    <td><input name="qty_bayar[]" class="form-control" type="hidden"
                                            value="{{ $temp->qty_pesan }}" readonly>{{ $temp->qty_pesan }}</td>
                                    <td> <input name="sub_bayar[]" class="form-control" type="hidden"
                                            value="{{ $temp->sub_total }}"
                                            readonly>{{ number_format($temp->sub_total) }}</td>
                                    <td align="center">
                                        <a href="/transaksi/hapus/{{ $temp->kd_brg }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                    </td>
                                </tr>
                                @php($total += $temp->sub_total)
                            @endforeach
                            <tr>
                                <td colspan="3"><b>Total</b></td>

                                <td>
                                    <input name="total" class="form-control" type="hidden"
                                        value="{{ $total }}">Total {{ number_format($total) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <input type="submit" class="btn btn-primary btn-send" value="Simpan Pembayaran">

            </div>

        </div>
    </form>
@endsection
