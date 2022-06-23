@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-4"><h3>Laporan Penjualan</h3></div>
                        <div class="table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No Pemesanan</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($detail as $value)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $value->no_psn }}</td>
                                            <td>{{ $value->nm_cust }}</td>
                                            <td>{{ $value->kd_brg }}</td>
                                            <td>{{ $value->nm_brg }}</td>
                                            <td>{{ $value->qty_pesan }}</td>
                                            <td>{{ number_format($value->sub_total) }}</td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table><br>
                            {{-- Pagination --}}
                            {{-- <div class="d-flex justify-content-end">
                                {!! $tampil->links() !!}
                            </div>
                            @if (count($tampil) == 0)
                                <div class="text-center">Tidak ada data!</div>
                            @endif --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
