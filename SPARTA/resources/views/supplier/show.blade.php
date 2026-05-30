@extends('app.master')

@section('content')

    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">

                    Detail Supplier

                </h2>

                <p class="text-muted">

                    Informasi supplier dan produk yang disuplai

                </p>

            </div>

            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">

                Kembali

            </a>

        </div>

        {{-- Informasi Supplier --}}
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-primary text-white">

                Informasi Supplier

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Kode Supplier</strong>

                        <p class="mb-0">

                            {{ $supplier->kode_supplier }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Nama Supplier</strong>

                        <p class="mb-0">

                            {{ $supplier->nama_supplier }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Nama Kontak</strong>

                        <p class="mb-0">

                            {{ $supplier->nama_kontak }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Telepon</strong>

                        <p class="mb-0">

                            {{ $supplier->telepon }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Email</strong>

                        <p class="mb-0">

                            {{ $supplier->email }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Alamat</strong>

                        <p class="mb-0">

                            {{ $supplier->alamat }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- Produk Supplier --}}
        <div class="card shadow-sm">

            <div class="card-header bg-success text-white">

                Produk Yang Disuplai

                <span class="badge bg-light text-dark ms-2">

                    {{ $supplier->products->count() }}

                    Produk

                </span>

            </div>

            <div class="card-body">

                @if ($supplier->products->count())
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>Kode Produk</th>

                                    <th>Nama Produk</th>

                                    <th>Merk</th>

                                    <th>Stok</th>

                                    <th>Harga Jual</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($supplier->products as $product)
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

                                            {{ $product->stok }}

                                        </td>

                                        <td>

                                            Rp
                                            {{ number_format($product->harga_jual, 0, ',', '.') }}

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                @else
                    <div class="alert alert-warning mb-0">

                        Supplier ini belum memiliki produk yang terhubung.

                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection
