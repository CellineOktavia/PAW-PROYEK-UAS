<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Laporan Pelanggan

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

        LAPORAN DATA PELANGGAN

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
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($customers as $customer)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $customer->kode_customer }}</td>

                    <td>{{ $customer->nama_customer }}</td>

                    <td>{{ $customer->telepon }}</td>

                    <td>{{ $customer->alamat }}</td>

                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
