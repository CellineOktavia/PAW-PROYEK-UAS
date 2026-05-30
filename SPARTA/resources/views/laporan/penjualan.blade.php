@extends('app.master')

@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">

            Laporan Penjualan

        </h2>

        <div class="mb-3">

            <a href="{{ route('laporan.penjualan.pdf') }}" class="btn btn-danger">

                DOWNLOAD PDF

            </a>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>No Penjualan</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($penjualans as $penjualan)
                            <tr>

                                <td>
                                    {{ $penjualan->nomor_penjualan }}
                                </td>

                                <td>
                                    {{ $penjualan->customer->nama_customer ?? '-' }}
                                </td>

                                <td>
                                    {{ $penjualan->tanggal }}
                                </td>

                                <td>

                                    Rp
                                    {{ number_format($penjualan->total, 0, ',', '.') }}

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
