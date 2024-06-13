<!DOCTYPE html>
<html>

<head>
    <title>PackingApp</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            width: 100%;
            background-color: #fff;
            margin: 0 auto;
        }

        p {
            margin: 10px 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <table class="container" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td>
                <p>{{ $bodyatas }}</p>
                <p>{{ $nama }} </p>
                <p>{{ $npm }} </p>
                <p>{{ $judul }} </p>
                <p>{{ $bodybawah }}, Thank you</p>
            </td>
        </tr>
    </table>
</body>

</html>
