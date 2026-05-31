<div class="list-group list-group-flush">


    {{-- OWNER --}}
    @if (Auth::user()->role == 'owner')
        <a href="{{ route('owner.dashboard') }}"
            class="list-group-item list-group-item-action {{ request()->is('owner/dashboard') ? 'active' : '' }}">
            📊 Dashboard Owner
        </a>

        {{-- TRANSAKSI --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Transaksi
        </div>

        <a href="/penjualan"
            class="list-group-item list-group-item-action {{ request()->is('penjualan*') ? 'active' : '' }}">
            🧾 Data Penjualan
        </a>

        <a href="/faktur" class="list-group-item list-group-item-action {{ request()->is('faktur*') ? 'active' : '' }}">
            🛒 Data Pembelian
        </a>

        {{-- LAPORAN --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Laporan
        </div>

        <a href="/laporan/penjualan"
            class="list-group-item list-group-item-action {{ request()->is('laporan/penjualan*') ? 'active' : '' }}">
            📈 Laporan Penjualan
        </a>

        <a href="/laporan/pembelian"
            class="list-group-item list-group-item-action {{ request()->is('laporan/pembelian*') ? 'active' : '' }}">
            📊 Laporan Pembelian
        </a>

        <a href="/laporan/stok"
            class="list-group-item list-group-item-action {{ request()->is('laporan/stok*') ? 'active' : '' }}">
            📦 Laporan Stok
        </a>

        <a href="/laporan/customer"
            class="list-group-item list-group-item-action {{ request()->is('laporan/customer*') ? 'active' : '' }}">
            👤 Laporan Customer
        </a>

        <a href="/laporan/supplier"
            class="list-group-item list-group-item-action {{ request()->is('laporan/supplier*') ? 'active' : '' }}">
            🚚 Laporan Supplier
        </a>
    @endif

    {{-- ADMIN --}}
    @if (Auth::user()->role == 'admin')
        {{-- DASHBOARD --}}
        <a href="/dashboard"
            class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
            📊 Dashboard Admin
        </a>

        {{-- MASTER DATA --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Master Data
        </div>

        <a href="{{ route('customer.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('customer.*') ? 'active' : '' }}">
            👤 Pelanggan
        </a>

        <a href="/produk"
            class="list-group-item list-group-item-action {{ request()->is('produk*') ? 'active' : '' }}">
            📦 Produk
        </a>

        <a href="/supplier"
            class="list-group-item list-group-item-action {{ request()->is('supplier*') ? 'active' : '' }}">
            🚚 Supplier
        </a>

        {{-- PEMBELIAN --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Pembelian
        </div>

        <a href="/faktur"
            class="list-group-item list-group-item-action {{ request()->is('faktur*') ? 'active' : '' }}">
            🛒 Faktur Pembelian
        </a>

        {{-- PENJUALAN --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Penjualan
        </div>

        <a href="/penjualan"
            class="list-group-item list-group-item-action {{ request()->is('penjualan*') ? 'active' : '' }}">
            🧾 Faktur Penjualan
        </a>

        {{-- INVENTORY --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Inventory
        </div>

        <a href="/stok-kritis"
            class="list-group-item list-group-item-action {{ request()->is('stok-kritis*') ? 'active' : '' }}">
            ⚠️ Stok Kritis
        </a>

        <a href="/riwayat-stok"
            class="list-group-item list-group-item-action {{ request()->is('riwayat-stok*') ? 'active' : '' }}">
            📈 Riwayat Stok
        </a>

        {{-- LAPORAN --}}
        <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
            Laporan
        </div>

        <a href="/laporan"
            class="list-group-item list-group-item-action {{ request()->is('laporan*') ? 'active' : '' }}">
            📑 Laporan
        </a>
    @endif

    {{-- AKUN --}}
    <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
        Akun
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="list-group-item list-group-item-action logout-btn">
            🚪 Logout
        </button>
    </form>
</div>
