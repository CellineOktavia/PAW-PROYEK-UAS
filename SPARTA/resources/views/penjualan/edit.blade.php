@extends('app.master')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            Edit Penjualan
        </div>
        <div class="card-body">
            <form action="{{ route('penjualan.update', $penjualan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>
                        Customer
                    </label>
                    <select name="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $customer->id == $penjualan->customer_id ? 'selected' : '' }}>
                                {{ $customer->nama_customer }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>
                        Produk
                    </label>
                    <select name="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $detail->product_id ? 'selected' : '' }}>
                                {{ $product->nama_produk }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>
                        Qty
                    </label>
                    <input type="number" name="qty" class="form-control" value="{{ $detail->qty }}">
                </div>
                <div class="mb-3">
                    <label>
                        Tanggal
                    </label>
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ \Carbon\Carbon::parse($penjualan->tanggal)->format('Y-m-d') }}">
                </div>
                <button class="btn btn-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
@endsection
