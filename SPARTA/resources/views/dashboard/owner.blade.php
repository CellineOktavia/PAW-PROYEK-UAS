@extends('app.master')

@section('content')
    <div class="container-fluid">

        {{-- HERO BANNER --}}
        <div class="card border-0 shadow-lg mb-4">
            <div class="card-body text-white p-5"
                style="
                background: linear-gradient(
                    135deg,
                    #2563eb,
                    #1e40af
                );
                border-radius:20px;
            ">

                <h1 class="fw-bold">
                    📊 Dashboard Owner
                </h1>

                <p class="mb-2">
                    Ringkasan Performa Bisnis Toko
                    <strong>Richie Motor</strong>
                </p>

                <h2 class="fw-bold">
                    Rp {{ number_format($profit, 0, ',', '.') }}
                </h2>

                <small>
                    Estimasi Profit Keseluruhan
                </small>

            </div>
        </div>

        {{-- KPI CARD --}}
        <div class="row g-4 mb-4">

            <div class="col-md-4">
                <div class="card bg-primary text-white border-0 shadow">
                    <div class="card-body">
                        <h5>📦 Total Produk</h5>
                        <h2>{{ $totalProduk }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success text-white border-0 shadow">
                    <div class="card-body">
                        <h5>🚚 Total Supplier</h5>
                        <h2>{{ $totalSupplier }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning text-dark border-0 shadow">
                    <div class="card-body">
                        <h5>👤 Total Customer</h5>
                        <h2>{{ $totalCustomer }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-info text-white border-0 shadow">
                    <div class="card-body">
                        <h5>💰 Total Penjualan</h5>
                        <h4>
                            Rp {{ number_format($totalPenjualan, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-secondary text-white border-0 shadow">
                    <div class="card-body">
                        <h5>🛒 Total Pembelian</h5>
                        <h4>
                            Rp {{ number_format($totalPembelian, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-danger text-white border-0 shadow">
                    <div class="card-body">
                        <h5>📈 Profit</h5>
                        <h4>
                            Rp {{ number_format($profit, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>

        </div>

        {{-- CHART --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h4 class="fw-bold mb-3">
                    📊 Statistik Pendapatan Bulanan
                </h4>

                <canvas id="incomeChart" height="100"></canvas>

            </div>
        </div>

        {{-- ANALYTICS --}}
        <div class="row g-4">

            {{-- TOP PRODUK --}}
            <div class="col-md-4">

                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h4 class="mb-3">
                            🏆 Top Penjualan Produk
                        </h4>

                        @forelse($topProduk as $index => $produk)
                            <div class="d-flex justify-content-between mb-2">

                                <span>
                                    {{ $index + 1 }}.
                                    {{ $produk->nama_produk }}
                                </span>

                                <strong>
                                    {{ $produk->total_terjual }}
                                </strong>

                            </div>

                        @empty

                            <p class="text-muted">
                                Belum ada data
                            </p>
                        @endforelse

                    </div>
                </div>

            </div>

            {{-- TOP CUSTOMER --}}
            <div class="col-md-4">

                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h4 class="mb-3">
                            👤 Top Customer
                        </h4>

                        @forelse($topCustomer as $index => $customer)
                            <div class="d-flex justify-content-between mb-2">

                                <span>
                                    {{ $index + 1 }}.
                                    {{ $customer->nama_customer }}
                                </span>

                                <strong>
                                    Rp {{ number_format($customer->total_belanja, 0, ',', '.') }}
                                </strong>

                            </div>

                        @empty

                            <p class="text-muted">
                                Belum ada data
                            </p>
                        @endforelse

                    </div>
                </div>

            </div>

            {{-- STOK KRITIS --}}
            <div class="col-md-4">

                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h4 class="mb-3">
                            ⚠️ Stok Kritis
                        </h4>

                        @forelse($stokKritis as $stok)
                            <div class="d-flex justify-content-between mb-2">

                                <span>
                                    {{ $stok->nama_produk }}
                                </span>

                                <strong>
                                    {{ $stok->stok }}
                                </strong>

                            </div>

                        @empty

                            <span class="text-success">
                                Tidak ada stok kritis
                            </span>
                        @endforelse

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels =
            {!! json_encode($pendapatanBulanan->pluck('bulan')) !!};

        const values =
            {!! json_encode($pendapatanBulanan->pluck('total')) !!};

        new Chart(
            document.getElementById('incomeChart'), {
                type: 'bar',

                data: {
                    labels: labels,

                    datasets: [{
                        label: 'Pendapatan Bulanan (Rp)',
                        data: values,
                        borderWidth: 1
                    }]
                },

                options: {
                    responsive: true,

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }
        );
    </script>
@endpush
