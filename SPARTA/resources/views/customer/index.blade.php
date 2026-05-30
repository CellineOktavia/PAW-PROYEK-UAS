@extends('app.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Data Pelanggan

            </h2>

            <p class="text-muted">

                Kelola seluruh pelanggan Richie Motor

            </p>

        </div>

        <a href="{{ route('customer.create') }}" class="btn btn-primary">

            + Tambah Pelanggan

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('customer.index') }}">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text" name="search" class="form-control"
                            placeholder="Cari kode atau nama pelanggan..." value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($customers as $customer)
                            <tr>

                                <td>

                                    {{ $customer->kode_customer }}

                                </td>

                                <td>

                                    {{ $customer->nama_customer }}

                                </td>

                                <td>

                                    {{ $customer->telepon }}

                                </td>

                                <td>

                                    {{ $customer->email }}

                                </td>

                                <td>

                                    @if ($customer->aktif)
                                        <span class="badge bg-success">

                                            Aktif

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Nonaktif

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('customer.edit', $customer) }}"
                                        class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('customer.destroy', $customer) }}"
                                        method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Hapus customer ini?')"
                                            class="btn btn-danger btn-sm">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    Tidak ada data pelanggan

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $customers->links() }}

            </div>

        </div>

    </div>
@endsection
