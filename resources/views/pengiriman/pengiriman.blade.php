@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <select name="nm_cust" id="nm_cust" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($customer['data'] as $cust)
                                <option value="{{ $cust->nm_cust }}">{{ $cust->nm_cust }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <select name="alamat" id="alamat" class="form-control" required>
                            <option value="">Pilih</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_psn" class="col-sm-2 col-form-label">Nomor Pemesanan</label>
                    <div class="col-sm-4">
                        <select name="no_psn" id="no_psn" class="form-control" required>
                            <option value="">Pilih</option>
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
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>No Kirim</th>
                            <th>Tanggal Kirim</th>
                            <th>Nomor Pesanan</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Driver</th>
                            <th>Aksi</th>
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
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ route('pembayaran.hapus', $value->no_kirim) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ method_field('DELETE') }}
                                        @csrf

                                        <a href="{{ route('cetak.kirim_pdf', [Crypt::encryptString($value->no_kirim)]) }}"
                                            target="_blank"
                                            class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Kirim
                                        </a>
                                        <a href="{{ url('/pengiriman/hapus/' . Crypt::encryptString($value->no_kirim)) }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </form>
                                </td>
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

    <!-- Script -->
    <script>
        $(document).ready(function() {
            $('#nm_cust').change(function() {

                var nm_id = $(this).val();
                let link = `{{ url('pengiriman/psn-cust') }}`

                $('#alamat').find('option').not(':first').remove();
                $('#no_psn').find('option').not(':first').remove();

                $.ajax({
                    url: link,
                    type: 'GET',
                    data: {
                        id: nm_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        
                        if (response.nm_cust.length > 0) {
                            let len = response.nm_cust.length;
                            for (let i = 0; i < len; i++) {
                                let nm_cust = response.nm_cust[i].nm_cust;
                                let alamat = response.nm_cust[i].alamat;
                                let option = "<option value='" + alamat + "'>" + alamat +
                                    "</option>";
                                $("#alamat").append(option);
                            }
                        }

                        if (response.nm_psn.length > 0) {
                            let len = response.nm_psn.length;
                            for (let i = 0; i < len; i++) {
                                let nm_cust = response.nm_psn[i].nm_cust;
                                let no_psn = response.nm_psn[i].no_psn;
                                let option = "<option value='" + no_psn + "'>" + no_psn +
                                    "</option>";
                                $("#no_psn").append(option);
                            }
                        }
                    }
                });
            })
        });
    </script>
@endsection
