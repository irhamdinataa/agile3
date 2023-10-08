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
            font-family: 'Times New Roman', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
            margin-left:20px;
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
        div.footer{
            margin-left:350px;
            text-align: left;

        }
    </style>

</head>

<body>
    <div class="container">
    <img src="{{ public_path('img/logo_darmajaya.png') }}" width="700" alt="">
    <h3>FORM SERAH TERIMA</h3>
    <h3>LAPORAN KERJA PRAKTEK</h3>
    <h3>TAHUN 2023</h3>
    <br>
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
                    <td>NPM </td>
                    <td>:</td>
                    <td>{{ $npm }}</td>
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
        <br><br><br><br><br><br><br>
        <div class="footer">
        <p>Bandar Lampung, {{$date}}</p>
        <p>Yang Menerima</p>
        <img src="{{ public_path('img/ttd.png') }}" width="150" alt="">
        <p><u>Citra Ayu Santhika</u></p>
        <p>NIK. 13670415</p>
        </div>
    </div>
</body>

</html>
