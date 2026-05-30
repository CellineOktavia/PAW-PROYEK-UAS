<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Laporan Penjualan

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

        LAPORAN PENJUALAN

    </h2>

    <p>

        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No Penjualan</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($penjualans as $penjualan)
                <tr>

                    <td>
                        {{ $penjualan->nomor_penjualan }}
                    </td>

                    <td>
                        {{ $penjualan->customer->nama_customer ?? '-' }}
                    </td>

                    <td>
                        {{ $penjualan->tanggal }}
                    </td>

                    <td>

                        Rp
                        {{ number_format($penjualan->total, 0, ',', '.') }}

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
