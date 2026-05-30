@extends('app.master')

@section('content')
    <div class="container-fluid">

        {{-- HERO --}}
        <div class="dashboard-hero mb-4">

            <span class="system-badge">
                SPARTA
            </span>

            <h1 class="system-title">
                Sparepart Inventory Management System
            </h1>

            <p class="system-subtitle">
                Richie Motor Management Dashboard
            </p>

            <div class="mt-4">

                <h3 class="welcome-user">
                    Halo, {{ Auth::user()->name }} 👋
                </h3>

                <span class="role-badge">
                    {{ strtoupper(Auth::user()->role) }}
                </span>

            </div>

        </div>

        {{-- STAT CARD --}}
        <div class="row g-4">

            <div class="col-lg-3">

                <a href="{{ route('produk.index') }}" class="stats-link">

                    <div class="stats-card primary">

                        <i class="bi bi-box-seam"></i>

                        <h2>{{ $totalProduk }}</h2>

                        <p>Total Produk</p>

                    </div>

                </a>

            </div>

            <div class="col-lg-3">

                <a href="{{ route('supplier.index') }}" class="stats-link">

                    <div class="stats-card success">

                        <i class="bi bi-truck"></i>

                        <h2>{{ $totalSupplier }}</h2>

                        <p>Supplier</p>

                    </div>

                </a>

            </div>

            <div class="col-lg-3">

                <a href="{{ route('faktur.index') }}" class="stats-link">

                    <div class="stats-card warning">

                        <i class="bi bi-receipt"></i>

                        <h2>{{ $totalFaktur }}</h2>

                        <p>Total Faktur</p>

                    </div>

                </a>

            </div>

            <div class="col-lg-3">

                <a href="{{ route('stok.kritis') }}" class="stats-link">

                    <div class="stats-card danger">

                        <i class="bi bi-exclamation-circle"></i>

                        <h2>{{ $stokKritis }}</h2>

                        <p>Stok Kritis</p>

                    </div>

                </a>

            </div>

        </div>

        {{-- INFO FILTER --}}
        <div class="alert alert-info mt-4">

            Menampilkan data dari

            <strong>{{ $startDate }}</strong>

            sampai

            <strong>{{ $endDate }}</strong>

        </div>

        {{-- CHART --}}
        <div class="dashboard-card mt-4">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5>

                    <i class="bi bi-bar-chart-fill me-2"></i>

                    Statistik Pendapatan

                </h5>

            </div>

            {{-- SHORTCUT FILTER --}}
            <div class="mb-4">

                <div class="btn-group">

                    <a href="{{ route('dashboard', ['filter' => 'hari']) }}"
                        class="btn {{ $filter == 'hari' ? 'btn-primary' : 'btn-outline-primary' }}">

                        Hari Ini

                    </a>

                    <a href="{{ route('dashboard', ['filter' => 'bulan']) }}"
                        class="btn {{ $filter == 'bulan' ? 'btn-primary' : 'btn-outline-primary' }}">

                        Bulan Ini

                    </a>

                    <a href="{{ route('dashboard', ['filter' => 'tahun']) }}"
                        class="btn {{ $filter == 'tahun' ? 'btn-primary' : 'btn-outline-primary' }}">

                        Tahun Ini

                    </a>

                </div>

            </div>

            {{-- CUSTOM FILTER --}}
            <form method="GET" action="{{ route('dashboard') }}" class="row g-3 mb-4">

                <input type="hidden" name="filter" value="custom">

                <div class="col-md-4">

                    <label class="form-label">

                        Tanggal Awal

                    </label>

                    <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Tanggal Akhir

                    </label>

                    <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">

                </div>

                <div class="col-md-4 d-flex align-items-end">

                    <button type="submit" class="btn btn-success w-100">

                        Terapkan Filter

                    </button>

                </div>

            </form>

            <canvas id="incomeChart" height="120"></canvas>

        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels =
            {!! json_encode($pendapatanHarian->pluck('tanggal')->values()) !!};

        const values =
            {!! json_encode($pendapatanHarian->pluck('total')->values()) !!};

        const ctx =
            document.getElementById('incomeChart');

        if (ctx) {

            new Chart(ctx, {

                type: 'bar',

                data: {

                    labels: labels,

                    datasets: [{

                        label: 'Pendapatan (Rp)',

                        data: values,

                        borderWidth: 1

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    scales: {

                        y: {

                            beginAtZero: true

                        }

                    }

                }

            });

        }
    </script>
@endpush
