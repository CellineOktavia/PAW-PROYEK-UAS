@extends('app.master')

@section('content')
    <div class="container-fluid">

        <h2 class="fw-bold mb-2"> 📊 Laporan SPARTA </h2>
        <p class="text-muted mb-4"> Pilih jenis laporan yang ingin ditampilkan untuk memantau data operasional, transaksi,
            dan inventori pada sistem SPARTA. </p>
        <div class="row g-4">
            <div class="col-md-4"> <a href="{{ route('laporan.produk') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-primary">
                        <h5 class="fw-bold">📦 Laporan Produk</h5>
                        <p class="text-muted mb-0"> Menampilkan data produk, stok barang, dan informasi sparepart yang
                            tersedia. </p>
                    </div>
                </a> </div>
            <div class="col-md-4"> <a href="{{ route('laporan.supplier') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-success">
                        <h5 class="fw-bold">🚚 Laporan Supplier</h5>
                        <p class="text-muted mb-0"> Menampilkan data supplier dan aktivitas pemasokan barang. </p>
                    </div>
                </a> </div>
            <div class="col-md-4"> <a href="{{ route('laporan.customer') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-info">
                        <h5 class="fw-bold">👤 Laporan Pelanggan</h5>
                        <p class="text-muted mb-0"> Menampilkan data pelanggan yang terdaftar dalam sistem. </p>
                    </div>
                </a> </div>
            <div class="col-md-4"> <a href="{{ route('laporan.pembelian') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-warning">
                        <h5 class="fw-bold">🛒 Laporan Pembelian</h5>
                        <p class="text-muted mb-0"> Menampilkan transaksi pembelian sparepart dari supplier. </p>
                    </div>
                </a> </div>
            <div class="col-md-4"> <a href="{{ route('laporan.penjualan') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-danger">
                        <h5 class="fw-bold">🧾 Laporan Penjualan</h5>
                        <p class="text-muted mb-0"> Menampilkan transaksi penjualan dan pendapatan perusahaan. </p>
                    </div>
                </a> </div>
            <div class="col-md-4"> <a href="{{ route('laporan.stok') }}" class="text-decoration-none">
                    <div class="dashboard-card h-100 border-start border-4 border-dark">
                        <h5 class="fw-bold">📈 Laporan Stok</h5>
                        <p class="text-muted mb-0"> Menampilkan kondisi stok barang dan riwayat perubahan stok. </p>
                    </div>
                </a> </div>
        </div>


    </div>
@endsection
