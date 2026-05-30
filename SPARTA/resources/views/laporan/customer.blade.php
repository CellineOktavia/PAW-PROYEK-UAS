@extends('app.master')

@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">

            Laporan Customer

        </h2>

        <div class="mb-3">

            <a href="{{ route('laporan.customer.pdf') }}" class="btn btn-danger">

                DOWNLOAD PDF

            </a>

        </div>
        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($customers as $customer)
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
                                    {{ $customer->alamat }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
