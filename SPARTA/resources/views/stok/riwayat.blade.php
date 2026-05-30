@extends('app.master')

@section('content')
    <div class="container-fluid">

        <h2 class="fw-bold mb-4">

            Riwayat Stok

        </h2>

        <div class="card shadow-sm">

            <div class="card-body">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>Tanggal</th>

                            <th>Produk</th>

                            <th>Jenis</th>

                            <th>Qty</th>

                            <th>Keterangan</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($movements as $movement)
                            <tr>

                                <td>

                                    {{ $movement->created_at }}

                                </td>

                                <td>

                                    {{ $movement->product->nama_produk }}

                                </td>

                                <td>

                                    @if ($movement->jenis == 'masuk')
                                        <span class="badge bg-success">

                                            Masuk

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Keluar

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    {{ $movement->qty }}

                                </td>

                                <td>

                                    {{ $movement->keterangan }}

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                {{ $movements->links() }}

            </div>

        </div>

    </div>
@endsection
