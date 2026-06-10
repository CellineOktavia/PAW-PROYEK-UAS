@extends('app.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
@endpush

@section('content')
    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">

                Tambah Supplier

            </h2>

            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="kode_supplier" class="form-control mb-3" placeholder="Kode Supplier">

                <input type="text" name="nama_supplier" class="form-control mb-3" placeholder="Nama Supplier">

                <input type="text" name="nama_kontak" class="form-control mb-3" placeholder="Nama Kontak">

                <input type="text" name="telepon" class="form-control mb-3" placeholder="Telepon">

                <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                <textarea name="alamat" class="form-control mb-3" rows="3" placeholder="Alamat"></textarea>

                <select name="aktif" class="form-select mb-3">

                    value="{{ old('kode_supplier', $supplier->kode_supplier) }}"

                    value="{{ old('kode_supplier', $supplier->kode_supplier) }}"

                </select>

                <button type="submit" class="btn btn-primary">

                    Simpan Supplier

                </button>

            </form>

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
                placeholder: 'Cari data...',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endpush
