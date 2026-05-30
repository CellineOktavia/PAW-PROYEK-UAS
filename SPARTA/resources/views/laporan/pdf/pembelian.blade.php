<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Laporan Pembelian

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

        LAPORAN PEMBELIAN

    </h2>

    <p>

        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}

    </p>

    <table>

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

                    <td>{{ $faktur->nomor_faktur }}</td>

                    <td>
                        {{ $faktur->supplier->nama_supplier ?? '-' }}
                    </td>

                    <td>{{ $faktur->tanggal }}</td>

                    <td>

                        Rp
                        {{ number_format($faktur->total, 0, ',', '.') }}

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
