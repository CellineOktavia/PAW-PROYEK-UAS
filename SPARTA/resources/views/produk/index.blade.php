@extends('app.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- Header --}}
        <div>

            <h1 class="fw-bold">
                Data Produk
            </h1>

            <p class="text-muted">
                Kelola seluruh sparepart Richie Motor
            </p>

        </div>

        <a href="{{ route('produk.create') }}" class="btn btn-primary">

            + Tambah Produk

        </a>

    </div>

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    {{-- Cari Produk --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('produk.index') }}">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text" name="search" class="form-control"
                            placeholder="Cari kode atau nama produk..." value="{{ request('search') }}">

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

    {{-- Table Produk --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Kode</th>

                            <th>Nama Produk</th>

                            <th>Merk</th>

                            <th>Stok</th>

                            <th>Harga</th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)
                            <tr>

                                <td>

                                    {{ $product->kode_produk }}

                                </td>

                                <td>

                                    {{ $product->nama_produk }}

                                </td>

                                <td>

                                    {{ $product->merk }}

                                </td>

                                <td>

                                    @if ($product->stok <= $product->stok_minimum)
                                        <span class="badge bg-danger">

                                            {{ $product->stok }}

                                        </span>
                                    @else
                                        <span class="badge bg-success">

                                            {{ $product->stok }}

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    Rp
                                    {{ number_format($product->harga_jual, 0, ',', '.') }}

                                </td>

                                <td>

                                    <a href="{{ route('produk.edit', $product->id) }}"
                                        class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('produk.destroy', $product->id) }}"
                                        method="POST" class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center text-muted">

                                    Tidak ada data produk

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4">

        {{ $products->links() }}

    </div>
@endsection
