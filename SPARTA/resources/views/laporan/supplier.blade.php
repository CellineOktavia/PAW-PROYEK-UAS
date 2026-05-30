@extends('app.master')

@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">

            Laporan Supplier

        </h2>

        <div class="mb-3">

            <a href="{{ route('laporan.supplier.pdf') }}" class="btn btn-danger">

                DOWNLOAD PDF

            </a>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Kode</th>
                            <th>Nama Supplier</th>
                            <th>Kontak</th>
                            <th>Telepon</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($suppliers as $supplier)
                            <tr>

                                <td>
                                    {{ $supplier->kode_supplier }}
                                </td>

                                <td>
                                    {{ $supplier->nama_supplier }}
                                </td>

                                <td>
                                    {{ $supplier->nama_kontak }}
                                </td>

                                <td>
                                    {{ $supplier->telepon }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
