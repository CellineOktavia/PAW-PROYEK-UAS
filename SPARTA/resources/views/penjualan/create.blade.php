@extends('app.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Buat Penjualan</h2>
                <p class="text-muted">Transaksi penjualan barang</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('penjualan.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pelanggan</label>
                            <select name="customer_id" class="form-select" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->nama_customer }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                    </div>

                    <div class="row">

                        {{-- Dropdown produk dengan Select2 search --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Produk</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option
                                        value="{{ $product->id }}"
                                        data-harga="{{ $product->harga_jual }}"
                                        data-stok="{{ $product->stok }}">
                                        {{ $product->kode_produk }} - {{ $product->nama_produk }} (Stok: {{ $product->stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control" min="1" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" id="harga" class="form-control" readonly>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" id="subtotal" class="form-control" readonly>
                    </div>

                    <button class="btn btn-primary">Simpan Penjualan</button>
                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {

            // Inisialisasi Select2
            $('#product_id').select2({
                theme: 'bootstrap-5',
                placeholder: 'Cari kode atau nama produk...',
                allowClear: true,
                width: '100%',
            });

            // Auto-fill harga & hitung total saat produk dipilih
            $('#product_id').on('change', function () {
                const selected = $(this).find(':selected');
                const harga    = selected.data('harga') || 0;
                const stok     = selected.data('stok') || 0;

                $('#harga').val(Number(harga).toLocaleString('id-ID'));
                $('#qty').attr('max', stok); // batasi qty sesuai stok
                hitungTotal();
            });

            $('#qty').on('input', hitungTotal);
        });

        function hitungTotal() {
            const selected = $('#product_id').find(':selected');
            const harga    = selected.data('harga') || 0;
            const qty      = $('#qty').val() || 0;

            $('#subtotal').val((harga * qty).toLocaleString('id-ID'));
        }
    </script>
@endpush