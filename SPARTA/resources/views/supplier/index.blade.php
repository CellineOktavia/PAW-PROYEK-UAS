@extends('app.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- Header --}}
        <div>
            <h2 class="fw-bold">
                Data Supplier
            </h2>

            <p class="text-muted">
                Kelola seluruh supplier Richie Motor
            </p>

        </div>

        <a href="#" class="btn btn-primary">
            + Tambah Supplier
        </a>

    </div>

    {{-- Cari Supplier --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('supplier.index') }}">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari kode atau nama supplier..." value="{{ request('search') }}">
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

    {{-- Tabel Supplier --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Kontak</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($suppliers as $supplier)
                            <tr>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $supplier->kode_supplier }}
                                    </span>
                                </td>

                                <td>
                                    {{ $supplier->nama_supplier }}
                                </td>

                                <td>
                                    {{ $supplier->nama_kontak }}
                                </td>

                                <td>
                                    {{ $supplier->telepon }}
                                </td>

                                <td>
                                    {{ $supplier->email }}
                                </td>

                                <td>

                                    @if ($supplier->aktif)
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Nonaktif
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center text-muted">

                                    Tidak ada data supplier

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $suppliers->links() }}

            </div>

        </div>

    </div>
@endsection
