@extends('app.master')

@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">

            Laporan Pembelian

        </h2>

        <div class="mb-3">

            <a href="{{ route('laporan.pembelian.pdf') }}" class="btn btn-danger">

                DOWNLOAD PDF

            </a>

        </div>
        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>No Faktur</th>
                            <th>Supplier</th>
                            <th>Tanggal</th>
                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($fakturs as $faktur)
                            <tr>

                                <td>
                                    {{ $faktur->nomor_faktur }}
                                </td>

                                <td>
                                    {{ $faktur->supplier->nama_supplier ?? '-' }}
                                </td>

                                <td>
                                    {{ $faktur->tanggal }}
                                </td>

                                <td>

                                    Rp
                                    {{ number_format($faktur->total, 0, ',', '.') }}

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
