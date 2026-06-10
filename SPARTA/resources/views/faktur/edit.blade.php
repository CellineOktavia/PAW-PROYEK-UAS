@extends('app.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
@endpush

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                Edit Faktur
            </div>
            <div class="card-body">
                <form action="{{ route('faktur.update', $faktur) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">
                            Supplier
                        </label>

                        <select name="supplier_id" id="supplier_id" class="form-select" required>
                            <option value="">Pilih Supplier</option>

                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ $supplier->id == $faktur->supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->nama_supplier }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Tanggal
                        </label>

                        <input type="date" name="tanggal" class="form-control"
                            value="{{ \Carbon\Carbon::parse($faktur->tanggal)->format('Y-m-d') }}" required>
                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">
                        Detail Produk
                    </h5>

                    <input type="hidden" name="product_id" id="product_id" value="{{ $detail->product_id ?? '' }}">

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kode Produk</label>

                            <select id="kode_produk" class="form-select product-select" required>
                                <option value="">Pilih Kode Produk</option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga_beli }}"
                                        data-stok="{{ $product->stok }}"
                                        {{ ($detail->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                        {{ $product->kode_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nama Produk</label>

                            <select id="nama_produk" class="form-select product-select" required>
                                <option value="">Pilih Nama Produk</option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga_beli }}"
                                        data-stok="{{ $product->stok }}"
                                        {{ ($detail->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                        {{ $product->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Merk</label>

                            <select id="merk_produk" class="form-select product-select" required>
                                <option value="">Pilih Merk</option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga_beli }}"
                                        data-stok="{{ $product->stok }}"
                                        {{ ($detail->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                        {{ $product->merk }} - {{ $product->nama_produk }}
                                        ({{ $product->kode_produk }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control"
                                value="{{ $detail->qty ?? '' }}" min="1" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control"
                                value="{{ $detail->harga ?? '' }}" min="1" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="text" id="subtotal" class="form-control" readonly>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            let isSyncing = false;

            $('#supplier_id').select2({
                theme: 'bootstrap-5',
                placeholder: 'Cari supplier...',
                allowClear: true,
                width: '100%'
            });

            $('.product-select').select2({
                theme: 'bootstrap-5',
                placeholder: 'Cari produk...',
                allowClear: true,
                width: '100%'
            });

            $('.product-select').on('change', function() {
                if (isSyncing) return;

                const productId = $(this).val();

                if (!productId) {
                    clearProduct();
                    return;
                }

                pilihProduk(productId);
            });

            $('#qty, #harga').on('input', function() {
                hitungSubtotal();
            });

            // lanjutkan function pilihProduk, hitungSubtotal, clearProduct seperti kode kamu
        });
    </script>
@endpush
