<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Laporan Stok

    </title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
        }
    </style>

</head>

<body>

    <h2>

        LAPORAN STOK PRODUK

    </h2>

    <p>

        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Minimum</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($products as $product)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $product->kode_produk }}</td>

                    <td>{{ $product->nama_produk }}</td>

                    <td>{{ $product->merk }}</td>

                    <td>{{ $product->stok }}</td>

                    <td>{{ $product->stok_minimum }}</td>

                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
