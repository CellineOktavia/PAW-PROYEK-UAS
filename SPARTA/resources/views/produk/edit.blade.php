@extends('app.master')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">
                    Edit Produk
                </h2>

                <p class="text-muted">
                    Perbarui data sparepart Richie Motor
                </p>

            </div>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('produk.update', $product->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kode Produk
                            </label>

                            <input type="text" name="kode_produk" class="form-control"
                                value="{{ old('kode_produk', $product->kode_produk) }}" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nama Produk
                            </label>

                            <input type="text" name="nama_produk" class="form-control"
                                value="{{ old('nama_produk', $product->nama_produk) }}" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Merk
                            </label>

                            <input type="text" name="merk" class="form-control"
                                value="{{ old('merk', $product->merk) }}" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Supplier
                            </label>

                            <select name="supplier_id" class="form-select">

                                <option value="">
                                    Pilih Supplier
                                </option>

                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @selected(old('supplier_id', $product->supplier_id) == $supplier->id)>

                                        {{ $supplier->nama_supplier }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Stok
                            </label>

                            <input type="number" name="stok" class="form-control"
                                value="{{ old('stok', $product->stok) }}" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Stok Minimum
                            </label>

                            <input type="number" name="stok_minimum" class="form-control"
                                value="{{ old('stok_minimum', $product->stok_minimum) }}" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Harga Beli
                            </label>

                            <input type="number" name="harga_beli" class="form-control"
                                value="{{ old('harga_beli', $product->harga_beli) }}" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Harga Jual
                            </label>

                            <input type="number" name="harga_jual" class="form-control"
                                value="{{ old('harga_jual', $product->harga_jual) }}" required>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">

                        Simpan Perubahan

                    </button>

                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection
