<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Mahasiswa</title>
</head>

<body>
    <h1>
        Saya adalah mahasiswa program studi:
        @if ($progdi === 'TI')
            Teknik Informatika
        @elseif ($progdi === 'SI')
            Sistem Informasi
        @elseif ($progdi === 'IK')
            Ilmu Komunikasi
        @else
            Tidak ada progdi tersebut di Fakultas TIK
        @endif
    </h1>

</body>

</html>
