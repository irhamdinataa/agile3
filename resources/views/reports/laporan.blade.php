<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
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
            width: 90%;
            /* Ubah dari 110% ke 90% agar sesuai dengan lebar tabel */
            height: auto;
            background-color: #fff;
            text-align: center;
            /* Rata tengah horizontal */
        }

        img {
            display: block;
            margin: 0 auto;
            /* Rata tengah vertical dan horizontal */
            margin-bottom: 20px;
            /* Tambahkan margin bawah agar tidak terlalu rapat dengan tabel */
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-left:100px;
            /* Ubah dari 90% ke 100% agar tabel mencakup seluruh lebar container */
        }

        tr {
            padding-bottom: 10px;
            /* Adjust the value as needed */
        }

        ,
        h4,
        p {
            margin: 0px;
        }
    </style>

</head>

<body>
    <div class="container">
    <img src="{{ public_path('img/logo_darmajaya.png') }}" alt="">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>No. </td>
                    <td>:</td>
                    <td>{{ $id }}/DMJ/LPPM/{{ $month }}-2023 </td>
                </tr><br>
                <tr>
                    <td>Nama </td>
                    <td>:</td>
                    <td>{{ $nama }}</td>
                </tr><br>
                <tr>
                    <td>Program Studi </td>
                    <td>:</td>
                    <td>{{ $program }}</td>
                </tr><br>
                <tr>
                    <td>Dosen Pembimbing Lapangan</td>
                    <td>:</td>
                    <td>{{ $dosen }}</td>
                </tr><br>
                <tr>
                    <td>Jenis Laporan</td>
                    <td>:</td>
                    <td>{{ $jenis }}</td>
                </tr><br>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{ $judul }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
