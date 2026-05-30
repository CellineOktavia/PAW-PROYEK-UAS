@extends('app.master')

@section('content')
    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">
                    Data Faktur Pembelian
                </h2>

                <p class="text-muted">
                    Riwayat transaksi pembelian dari supplier
                </p>

            </div>

            <a href="{{ route('faktur.create') }}" class="btn btn-primary">

                + Tambah Faktur

            </a>

        </div>

        {{-- Search --}}
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <form action="{{ route('faktur.index') }}" method="GET">

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

        {{-- Table --}}
        <div class="card shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>No Faktur</th>
                                <th>Supplier</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th width="140">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($fakturs as $faktur)
                                <tr>

                                    <td>

                                        {{ $faktur->nomor_faktur }}

                                    </td>

                                    <td>

                                        {{ $faktur->supplier->nama_supplier ?? '-' }}

                                    </td>

                                    <td>

                                        {{ $faktur->tanggal }}

                                    </td>

                                    <td>

                                        <span class="badge bg-success">

                                            Rp {{ number_format($faktur->total, 0, ',', '.') }}

                                        </span>

                                    </td>

                                    <td>

                                        <a href="{{ route('faktur.show', $faktur) }}" class="btn btn-dark btn-sm">

                                            Detail

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center text-muted">

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

    </div>
@endsection
