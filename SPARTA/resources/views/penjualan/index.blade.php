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

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('penjualan.index') }}">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text" name="search" class="form-control" placeholder="Cari nomor penjualan..."
                            value="{{ $search ?? '' }}">

                    </div>

                    <div class="col-md-2">

                        <button type="submit" class="btn btn-primary w-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

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
                                @if (Auth::user()->role === 'owner')
                                    <a href="{{ route('penjualan.edit', $penjualan) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('penjualan.destroy', $penjualan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
