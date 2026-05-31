@extends('app.master')

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
                        <label>
                            Supplier
                        </label>
                        <select name="supplier_id" class="form-control">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ $supplier->id == $faktur->supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->nama_supplier }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>
                            Tanggal
                        </label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ \Carbon\Carbon::parse($faktur->tanggal)->format('Y-m-d') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
