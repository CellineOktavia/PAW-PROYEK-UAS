@extends('app.master')

@section('content')
    <div class="container-fluid">

        <h2 class="fw-bold mb-4">

            Laporan SPARTA

        </h2>

        <div class="row g-4">

            <div class="col-md-4">

                <a href="{{ route('laporan.produk') }}" class="btn btn-primary w-100 p-4">

                    📦 Laporan Produk

                </a>

            </div>

            <div class="col-md-4">

                <a href="{{ route('laporan.supplier') }}" class="btn btn-success w-100 p-4">

                    🚚 Laporan Supplier

                </a>

            </div>

            <div class="col-md-4">

                <a href="{{ route('laporan.customer') }}" class="btn btn-info w-100 p-4">

                    👤 Laporan Pelanggan

                </a>

            </div>

            <div class="col-md-4">

                <a href="{{ route('laporan.pembelian') }}" class="btn btn-warning w-100 p-4">

                    🛒 Laporan Pembelian

                </a>

            </div>

            <div class="col-md-4">

                <a href="{{ route('laporan.penjualan') }}" class="btn btn-danger w-100 p-4">

                    🧾 Laporan Penjualan

                </a>

            </div>

            <div class="col-md-4">

                <a href="{{ route('laporan.stok') }}" class="btn btn-dark w-100 p-4">

                    📈 Laporan Stok

                </a>

            </div>

        </div>

    </div>
@endsection
