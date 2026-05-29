@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="dashboard-hero mb-4">

            <div>

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

        </div>

        <div class="row g-4">

            {{-- Card Produk --}}
            <div class="col-lg-3">
                <a href="{{ route('produk.index') }}" class="stats-link">
                    <div class="stats-card primary">
                        <i class="bi bi-box-seam"></i>
                        <h2>245</h2>
                        <p>Total Produk</p>
                    </div>
                </a>
            </div>

            {{-- Card Supplier --}}
            <div class="col-lg-3">
                <a href="{{ route('supplier.index') }}" class="stats-link">
                    <div class="stats-card success">
                        <i class="bi bi-truck"></i>
                        <h2>32</h2>
                        <p>Supplier</p>
                    </div>
                </a>
            </div>

            {{-- Card Faktur --}}
            <div class="col-lg-3">
                <a href="{{ route('faktur.index') }}" class="stats-link">
                    <div class="stats-card warning">
                        <i class="bi bi-receipt"></i>
                        <h2>18</h2>
                        <p>Faktur Hari Ini</p>
                    </div>
                </a>
            </div>

            {{-- Card Stok Kritis --}}
            <div class="col-lg-3">
                <a href="{{ route('produk.index') }}" class="stats-link">
                    <div class="stats-card danger">
                        <i class="bi bi-exclamation-circle"></i>
                        <h2>5</h2>
                        <p>Stok Kritis</p>
                    </div>
                </a>
            </div>

            <div class="row mt-4 g-4">

                <div class="col-lg-6">

                    <div class="dashboard-card">

                        <h5>
                            <i class="bi bi-box me-2"></i>
                            Stok Menipis
                        </h5>

                        <table class="table align-middle mt-3">

                            <tr>
                                <td>Ban Motor IRC</td>
                                <td>
                                    <span class="badge bg-danger">
                                        3 Unit
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>Oli Yamalube</td>
                                <td>
                                    <span class="badge bg-warning">
                                        5 Unit
                                    </span>
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="dashboard-card">

                        <h5>
                            <i class="bi bi-clock-history me-2"></i>
                            Aktivitas Terbaru
                        </h5>

                        <ul class="activity-list">

                            <li>
                                Produk baru ditambahkan
                            </li>

                            <li>
                                Supplier baru dibuat
                            </li>

                            <li>
                                Faktur INV-001 berhasil dibuat
                            </li>

                            <li>
                                Stok produk diperbarui
                            </li>

                        </ul>

                    </div>

                </div>

            </div>
        @endsection
