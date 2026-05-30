<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Produk
    </title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

        h2 {
            text-align: center;
        }
    </style>

</head>

<body>

    <h2>

        Laporan Produk

    </h2>

    <p>

        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>Kode</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Harga Jual</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($products as $product)
                <tr>

                    <td>
                        {{ $product->kode_produk }}
                    </td>

                    <td>
                        {{ $product->nama_produk }}
                    </td>

                    <td>
                        {{ $product->merk }}
                    </td>

                    <td>
                        {{ $product->stok }}
                    </td>

                    <td>

                        Rp
                        {{ number_format($product->harga_jual, 0, ',', '.') }}

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
