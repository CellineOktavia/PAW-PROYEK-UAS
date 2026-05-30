@extends('app.master')

@section('content')
    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">

                Tambah Supplier

            </h2>

            <form action="{{ route('supplier.store') }}" method="POST">

                @csrf

                <input type="text" name="kode_supplier" class="form-control mb-3" placeholder="Kode Supplier">

                <input type="text" name="nama_supplier" class="form-control mb-3" placeholder="Nama Supplier">

                <input type="text" name="nama_kontak" class="form-control mb-3" placeholder="Nama Kontak">

                <input type="text" name="telepon" class="form-control mb-3" placeholder="Telepon">

                <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                <textarea name="alamat" class="form-control mb-3" rows="3" placeholder="Alamat"></textarea>

                <select name="aktif" class="form-select mb-3">

                    <option value="1">

                        Aktif

                    </option>

                    <option value="0">

                        Nonaktif

                    </option>

                </select>

                <button type="submit" class="btn btn-primary">

                    Simpan Supplier

                </button>

            </form>

        </div>

    </div>
@endsection
