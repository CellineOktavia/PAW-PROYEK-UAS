@extends('app.master')

@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">

            Laporan Stok Produk

        </h2>

        <div class="mb-3">

            <a href="{{ route('laporan.stok.pdf') }}" class="btn btn-danger">

                DOWNLOAD PDF

            </a>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Kode</th>
                            <th>Produk</th>
                            <th>Merk</th>
                            <th>Stok</th>
                            <th>Minimum</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($products as $product)
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

                                    <span class="badge bg-success">

                                        {{ $product->stok }}

                                    </span>

                                </td>

                                <td>

                                    {{ $product->stok_minimum }}

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
