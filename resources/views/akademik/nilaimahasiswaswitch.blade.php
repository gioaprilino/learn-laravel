<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1>Nilai Mahasiswa</h1>
            <div>
                @switch ($total_nilai)
                @case($total_nilai >= 0 and $total_nilai < 56)

                    <div class="alert alert-danger"> Sangat Jelek</div>
                @break
                @case($total_nilai >= 57 and $total_nilai < 85)

                    <div class="alert alert-success"> Memuaskan</div>
                @break
                @case($total_nilai >= 85 and $total_nilai <= 100)

                    <div class="alert alert-success"> Dengan Pujian</div>
                @break
                @default
                <div class="alert alert-danger">Nilai anda Tidak Valid</div>
                @endswitch
                    <h1>Nilai Mahasiswa</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $nama }}</td>
                                <td>{{ $nim }}</td>
                                <td>{{ $total_nilai }}</td>
                            </tr>
                    </table>
                    </tbody>
                    </table>

            </div>
            <h4 style="text-align: center;" class="container">Padang, &copy; <?= date('Y') ?></h4>
</body>

</html>
