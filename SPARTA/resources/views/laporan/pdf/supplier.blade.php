<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Laporan Supplier

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
            border: 1px solid #000;
        }

        th {
            background: #f2f2f2;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
        }
    </style>

</head>

<body>

    <h2>

        LAPORAN DATA SUPPLIER

    </h2>

    <p>

        Tanggal Cetak :
        {{ now()->format('d-m-Y H:i') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Kontak</th>
                <th>Telepon</th>
                <th>Email</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($suppliers as $supplier)
                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

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

                    <td>

                        {{ $supplier->email }}

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="footer">

        Total Supplier :
        {{ $suppliers->count() }}

    </div>

</body>

</html>
