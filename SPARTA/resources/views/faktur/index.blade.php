@extends('app.master')

@section('content')
    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">
                    Data Faktur
                </h2>
                <p class="text-muted">
                    Riwayat transaksi dan faktur Richie Motor
                </p>
            </div>
        </div>

        {{-- Cari Faktur --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('faktur.index') }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" placeholder="Cari nomor faktur..."
                                value="{{ request('search') }}">
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

        {{-- Tabel Faktur --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No Faktur</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($fakturs as $faktur)
                                <tr>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $faktur->nomor_faktur }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $faktur->tanggal }}
                                    </td>

                                    <td>

                                        <span class="badge bg-success">

                                            Rp {{ number_format($faktur->total, 0, ',', '.') }}

                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3" class="text-center text-muted">

                                        Tidak ada data faktur

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $fakturs->links() }}

                </div>

            </div>

        </div>
    @endsection
