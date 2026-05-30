<div class="list-group list-group-flush">

    {{-- DASHBOARD --}}
    <a href="/dashboard" class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
        📊 Dashboard
    </a>

    {{-- MASTER DATA --}}

    <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
        Master Data
    </div>

    <a
        href="{{ route('customer.index') }}"class="list-group-item list-group-item-action {{ request()->routeIs('customer.*') ? 'active' : '' }}">
        👤 Pelanggan
    </a>
    <a href="/produk" class="list-group-item list-group-item-action {{ request()->is('produk*') ? 'active' : '' }}">
        📦 Produk
    </a>

    <a href="/supplier" class="list-group-item list-group-item-action {{ request()->is('supplier*') ? 'active' : '' }}">
        🚚 Supplier
    </a>

    @yield('submenu-supplier')

    {{-- Pembelian Toko --}}
    <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
        Pembelian
    </div>

    <a href="/faktur" class="list-group-item list-group-item-action {{ request()->is('faktur*') ? 'active' : '' }}">
        🛒 Faktur Pembelian
    </a>

    @yield('submenu-faktur')

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

    <a href="/laporan" class="list-group-item list-group-item-action {{ request()->is('laporan*') ? 'active' : '' }}">
        📑 Laporan
    </a>

    {{-- AKUN --}}
    <div class="px-3 pt-3 pb-1 text-uppercase fw-bold small text-secondary">
        Akun
    </div>

    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirmLogout()">
        @csrf
        <button type="submit" class="list-group-item list-group-item-action logout-btn">
            🚪 Logout
        </button>
    </form>
</div>
