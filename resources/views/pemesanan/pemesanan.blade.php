@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pemesanan </h1>
    </div>
    <hr>
    <form action="/detail/store" method="POST">
        @csrf
        <div class="form-group col-sm-8">
            <label for="exampleFormControlInput1">No Pemesanan</label>

            {{-- <input type="text" name="no_psn" value="{{ $formatnya }}" class="form-control" id="exampleFormControlInput1">
            <input type="hidden" name="no_jurnal" value="{{ $formatnyaj }}" class="form-control" --}}
            <input type="text" name="no_psn" value="{{ $formatnya }}" class="form-control" id="exampleFormControlInput1"
                readonly>
            {{-- <input type="hidden" name="no_jurnal" value="" class="form-control" id="exampleFormControlInput1"> --}}

        </div>

        <div class="form-group col-sm-8">
            <label for="exampleFormControlInput1">Tanggal Transaksi</label>
            <input type="date" min="1" name="tgl_psn" id="tgl_psn" class="form-control"
                id="exampleFormControlInput1" require>
        </div>

        <div class="form-group col-sm-8">
            <label for="exampleFormControlInput1">Customer</label>
            <select name="nm_cust" id="cust select2" class="form-control" width="100%" required>
                <option value="">Pilih</option>
                @foreach ($customer as $cust)
                    <option value="{{ $cust->nm_cust }}">{{ $cust->nm_cust }} - {{ $cust->alamat }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-8">
            <label for="exampleFormControlInput1">Tanggal Jatuh Tempo</label>
            <input type="date" min="1" name="tgl_tempo" id="tgl_tempo" class="form-control"
                id="exampleFormControlInput1" required>
        </div>

        <div class="card-header py-3 d-flex justify-content-end">
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal"
                data-target="#exampleModalScrollable">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang
            </button>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                            @foreach ($temp_pemesanan as $temp)
                                <tr>
                                    <td><input name="kd_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->kd_brg }}" readonly>{{ $temp->kd_brg }}</td>
                                    <td><input name="nm_brg[]" class="form-control" type="hidden"
                                            value="{{ $temp->nm_brg }}" readonly>{{ $temp->nm_brg }}</td>
                                    <td><input name="qty_pesan[]" class="form-control" type="hidden"
                                            value="{{ $temp->qty_pesan }}" readonly>{{ $temp->qty_pesan }}</td>
                                    <td><input name="satuan[]" class="form-control" type="hidden"
                                            value="{{ $temp->satuan }}" readonly>{{ $temp->satuan }}</td>
                                    <td> <input name="sub_total[]" class="form-control" type="hidden"
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
                                <td colspan="4"><b>Total</b></td>

                                <td>
                                    <input name="total" class="form-control" type="hidden"
                                        value="{{ $total }}">Total {{ number_format($total) }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <input type="submit" class="btn btn-primary btn-send" value="Simpan Pemesanan">

            </div>

        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <div class="card-title">Data Pemesanan</div>

            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pemesanan</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($tampil as $value)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $value->no_psn }}</td>
                                <td>{{ $value->nm_cust }}</td>
                                <td>{{ $value->tgl_psn }}</td>
                                <td>{{ number_format($value->sub_total) }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ route('transaksi.hapus', $value->no_psn) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        
                                        <a href="{{ route('cetak.inv_pdf', [Crypt::encryptString($value->no_psn)]) }}"
                                            target="_blank"
                                            class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Invoice

                                        <a href="{{ url('/transaksi/hapus-pemesanan/' . Crypt::encryptString($value->no_psn)) }}"
                                            onclick="return confirm('Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table><br>
                {{-- Pagination --}}
                <div class="d-flex justify-content-end">
                    {!! $tampil->links() !!}
                </div>
                @if (count($tampil) == 0)
                    <div class="text-center">Tidak ada data!</div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/sem/store" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Barang</label>
                            <select name="brg" id="kd_brg select2" class="form-control" required width="100%">
                                <option value="">Pilih</option>
                                @foreach ($barang as $brg)
                                    <option value="{{ $brg->kd_brg }}">{{ $brg->nm_brg }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">QTY</label>
                            <input type="number" min="1" name="qty_pesan" id="qty_pesan" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Tambah Barang">
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
