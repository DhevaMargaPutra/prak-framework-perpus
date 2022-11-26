<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Anggota</title>
</head>

<body>
    <a href="{{ url('anggota/create') }}">Tambah Anggota</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Progdi</th>
            <th>Aksi</th>
        </tr>
        @php
            $no = 0;
        @endphp
        @foreach ($query as $row)
            @php
                $no++;
            @endphp
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row['nim'] }}</td>
                <td>{{ $row['nama'] }}</td>
                <td>{{ $optkategori[$row['progdi']] }}</td>
                <td><a href="{{ url('anggota/' . $row['ID_Anggota']) . '/edit' }}">Edit</a>
                    <a onclick="return confirm('Yakin?')" href="{{ url('buku/delete/' . $row['ID_Buku']) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
