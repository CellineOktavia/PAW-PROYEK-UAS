@extends('app.master')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">
                    Buat Penjualan
                </h2>

                <p class="text-muted">
                    Transaksi penjualan barang
                </p>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('penjualan.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Pelanggan
                            </label>

                            <select name="customer_id" class="form-select" required>

                                <option value="">
                                    Pilih Pelanggan
                                </option>

                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">

                                        {{ $customer->nama_customer }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal
                            </label>

                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Produk
                            </label>

                            <select name="product_id" id="product_id" class="form-select" required>

                                <option value="">
                                    Pilih Produk
                                </option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga_jual }}"
                                        data-stok="{{ $product->stok }}">

                                        {{ $product->nama_produk }}
                                        (Stok:
                                        {{ $product->stok }})
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Qty
                            </label>

                            <input type="number" name="qty" id="qty" class="form-control" min="1"
                                required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Harga
                            </label>

                            <input type="text" id="harga" class="form-control" readonly>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Total

                        </label>

                        <input type="text" id="subtotal" class="form-control" readonly>

                    </div>

                    <button class="btn btn-primary">

                        Simpan Penjualan

                    </button>

                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

    <script>
        const product =
            document.getElementById(
                'product_id'
            );

        const qty =
            document.getElementById(
                'qty'
            );

        const harga =
            document.getElementById(
                'harga'
            );

        const subtotal =
            document.getElementById(
                'subtotal'
            );

        function hitungTotal() {
            let selected =
                product.options[
                    product.selectedIndex
                ];

            let h =
                selected.dataset.harga || 0;

            let q =
                qty.value || 0;

            harga.value =
                Number(h).toLocaleString(
                    'id-ID'
                );

            subtotal.value =
                (h * q).toLocaleString(
                    'id-ID'
                );
        }

        product.addEventListener(
            'change',
            hitungTotal
        );

        qty.addEventListener(
            'input',
            hitungTotal
        );
    </script>
@endsection
