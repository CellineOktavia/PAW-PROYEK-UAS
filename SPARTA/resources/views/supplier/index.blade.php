@extends('app.master')

@section('content')
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Data Supplier
            </h2>

            <p class="text-muted">
                Kelola seluruh supplier Richie Motor
            </p>

        </div>

        <a href="{{ route('supplier.create') }}" class="btn btn-primary">

            + Tambah Supplier

        </a>

    </div>

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    {{-- Search Supplier --}}
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

                            <th width="100">
                                Detail
                            </th>

                            <th width="180">
                                Aksi
                            </th>

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

                                    <a href="{{ route('supplier.show', $supplier->id) }}"
                                        class="btn btn-dark btn-sm">

                                        <i class="bi bi-eye-fill"></i>

                                    </a>

                                </td>

                                <td>

                                    <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus supplier ini?')">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center text-muted">

                                    Tidak ada data supplier

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $suppliers->links() }}

            </div>

        </div>

    </div>
@endsection
