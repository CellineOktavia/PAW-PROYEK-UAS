@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="mb-4">

            <h2 class="fw-bold">

                Stok Kritis

            </h2>

            <p class="text-muted">

                Produk yang perlu segera direstock

            </p>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>Kode</th>

                                <th>Produk</th>

                                <th>Supplier</th>

                                <th>Stok</th>

                                <th>Minimum</th>

                                <th>Status</th>

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

                                        {{ $product->supplier?->nama_supplier }}

                                    </td>

                                    <td>

                                        {{ $product->stok }}

                                    </td>

                                    <td>

                                        {{ $product->stok_minimum }}

                                    </td>

                                    <td>

                                        <span class="badge bg-danger">

                                            KRITIS

                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        Tidak ada stok kritis

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $products->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
