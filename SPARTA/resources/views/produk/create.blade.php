@extends('app.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">

        <div class="mb-4">

            <h2 class="fw-bold">

                Tambah Produk

            </h2>

            <p class="text-muted">

                Tambahkan sparepart baru ke sistem

            </p>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('produk.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Kode Produk

                            </label>

                            <input type="text" name="kode_produk" class="form-control" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nama Produk

                            </label>

                            <input type="text" name="nama_produk" class="form-control" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Merk

                            </label>

                            <input type="text" name="merk" class="form-control" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Supplier
                            </label>

                            <select name="supplier_id" class="form-select select2" required>

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

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Stok

                            </label>

                            <input type="number" name="stok" class="form-control" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Stok Minimum

                            </label>

                            <input type="number" name="stok_minimum" class="form-control" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Harga Beli

                            </label>

                            <input type="number" name="harga_beli" class="form-control" required>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Harga Jual

                            </label>

                            <input type="number" name="harga_jual" class="form-control" required>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">

                                Deskripsi

                            </label>

                            <textarea name="deskripsi" rows="4" class="form-control"></textarea>

                        </div>

                    </div>

                    <button class="btn btn-primary">

                        Simpan Produk

                    </button>

                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

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
            $('.select2').select2({
                theme: 'bootstrap-5',
                placeholder: 'Cari supplier...',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endpush
