@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pengiriman</h1>
    </div>
    <hr>
    <form action="pengiriman/store" method="POST" class="form-horizontal">
        @csrf
        <div class="card card-info">
            <div class="card-body">

                <div class="form-group row">
                    <label for="no_kirim" class="col-sm-2 col-form-label">No Pengiriman</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="no_kirim" id="no_kirim"
                            value="{{ $no_kirim }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nm_cust" class="col-sm-2 col-form-label">Nama Customer</label>
                    <div class="col-sm-4">
                        <select name="nm_cust" id="cust select2" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($customer as $cust)
                                <option value="{{ $cust->nm_cust }}">{{ $cust->nm_cust }} - {{ $cust->alamat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_psn" class="col-sm-2 col-form-label">Nomor Pemesanan</label>
                    <div class="col-sm-4">
                        <select name="no_psn" id="cust select2" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($pemesanan as $pesan)
                                <option value="{{ $pesan->no_psn }}">{{ $pesan->no_psn }} - {{ $pesan->total }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_kirim" class="col-sm-2 col-form-label">Tanggal Pengiriman</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_kirim" id="tgl_kirim" placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Driver</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="driver" id="driver" placeholder="">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-send mt-2" value="Simpan">
            </div>

    </form>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>No Kirim</th>
                            <th>Tanggal Kirim</th>
                            <th>Nomor Pesanan</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Driver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pengiriman as $value)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $value->no_kirim }}</td>
                                <td>{{ $value->tgl_kirim }}</td>
                                <td>{{ $value->no_psn }}</td>
                                <td>{{ $value->nm_cust }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->driver }}</td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table><br>
                {{-- Pagination --}}
                <div class="d-flex justify-content-end">
                    {!! $pengiriman->links() !!}
                </div>
                @if (count($pengiriman) == 0)
                    <div class="text-center">Tidak ada data!</div>
                @endif
            </div>
        </div>
    </div>
@endsection
