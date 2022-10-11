@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pembayaran</h1>
    </div>


    @if (session('error'))
        <div class="alert alert-danger">
            <ul>
                {{ session('error') }}
            </ul>
        </div>
    @endif

    <div class="card-header py-3" align="right">
        <form action="/pembayaran/cari" method="GET">
            <input type="text" name="cari" placeholder="Cari Nomor Pemesanan .." value="{{ old('cari') }}">
            <input type="submit" class="btn btn-sm btn-primary shadow-sm" value="Cari">
        </form>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
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
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ route('pembayaran.hapus', $pesan->no_psn) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <a href="{{ url('/pembayaran/bayar/' . Crypt::encryptString($pesan->no_psn)) }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Bayar</a>

                                    </form>
                                    {{-- <form action="{{ route('delete', $pesan->no_psn) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    </div>
@endsection
