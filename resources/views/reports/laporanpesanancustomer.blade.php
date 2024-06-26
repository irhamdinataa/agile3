<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pesanan Customer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: -40px;
            padding: 40px;
            width: 110%;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin-left: -40px;
            width: 90%;
        }

        td,
        tr,
        th {
            border: 1px solid #333;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Kebutuhan</th>
                    <th>Jumlah done</th>
                    <th>Jumlah todo</th>
                    <th>Tanggal permintaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanancustomers as $pesanancustomer)
                    <tr style="text-align: center;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pesanancustomer->namabarang }}</td>
                        <td>{{ $pesanancustomer->kebutuhan }}</td>
                        <td>{{ $pesanancustomer->done }}</td>
                        <td>{{ $pesanancustomer->todo }}</td>
                        <td>{{ $pesanancustomer->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
