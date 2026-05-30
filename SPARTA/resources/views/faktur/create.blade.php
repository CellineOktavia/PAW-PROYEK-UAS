@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">
                    Tambah Faktur
                </h2>

                <p class="text-muted">
                    Buat transaksi pembelian baru
                </p>

            </div>

            <a href="{{ route('faktur.index') }}" class="btn btn-secondary">

                Kembali

            </a>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('faktur.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        {{-- Nomor Faktur --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nomor Faktur

                            </label>

                            <input type="text" name="nomor_faktur" class="form-control"
                                value="INV-{{ now()->format('YmdHis') }}" readonly>

                        </div>

                        {{-- Tanggal --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Tanggal

                            </label>

                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>

                        </div>

                        {{-- Supplier --}}
                        <div class="col-md-12 mb-3">

                            <label class="form-label">

                                Supplier

                            </label>

                            <select name="supplier_id" class="form-select" required>

                                <option value="">

                                    Pilih Supplier

                                </option>

                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">

                                        {{ $supplier->nama_supplier }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">

                        Detail Produk

                    </h5>

                    <div class="row">

                        {{-- Produk --}}
                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                Produk

                            </label>

                            <select name="product_id" class="form-select" required>

                                <option value="">

                                    Pilih Produk

                                </option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga_beli }}">

                                        {{ $product->kode_produk }}
                                        -
                                        {{ $product->nama_produk }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- Qty --}}
                        <div class="col-md-2 mb-3">

                            <label class="form-label">

                                Qty

                            </label>

                            <input type="number" name="qty" id="qty" class="form-control" min="1"
                                required>

                        </div>

                        {{-- Harga --}}
                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Harga

                            </label>

                            <input type="number" name="harga" id="harga" class="form-control" min="1"
                                required>

                        </div>

                        {{-- Subtotal --}}
                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Subtotal

                            </label>

                            <input type="text" id="subtotal" class="form-control" readonly>

                        </div>

                    </div>

                    <hr>

                    <div class="text-end">

                        <button type="submit" class="btn btn-primary">

                            Simpan Faktur

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        const produkSelect =
            document.querySelector(
                'select[name="product_id"]'
            );

        const qtyInput =
            document.getElementById('qty');

        const hargaInput =
            document.getElementById('harga');

        const subtotalInput =
            document.getElementById('subtotal');

        function hitungSubtotal() {
            const qty =
                parseInt(qtyInput.value) || 0;

            const harga =
                parseFloat(hargaInput.value) || 0;

            const subtotal =
                qty * harga;

            subtotalInput.value =
                subtotal.toLocaleString('id-ID');
        }

        produkSelect.addEventListener(
            'change',
            function() {
                const harga =
                    this.options[
                        this.selectedIndex
                    ].dataset.harga || 0;

                hargaInput.value = harga;

                hitungSubtotal();
            }
        );

        qtyInput.addEventListener(
            'input',
            hitungSubtotal
        );

        hargaInput.addEventListener(
            'input',
            hitungSubtotal
        );
    </script>
@endsection
