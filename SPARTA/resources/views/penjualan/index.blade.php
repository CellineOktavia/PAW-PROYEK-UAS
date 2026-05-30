@extends('app.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Data Penjualan

            </h2>

            <p class="text-muted">

                Transaksi penjualan barang

            </p>

        </div>

        <a href="{{ route('penjualan.create') }}" class="btn btn-primary">

            + Buat Penjualan

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
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($penjualans as $penjualan)
                        <tr>

                            <td>

                                {{ $penjualan->nomor_penjualan }}

                            </td>

                            <td>

                                {{ $penjualan->customer->nama_customer }}

                            </td>

                            <td>

                                {{ $penjualan->tanggal }}

                            </td>

                            <td>

                                Rp
                                {{ number_format($penjualan->total, 0, ',', '.') }}

                            </td>

                            <td>

                                <a href="{{ route('penjualan.show', $penjualan) }}" class="btn btn-dark btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
