<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
</head>

<body>
    <form action="{{ url('anggota') }}" method="POST" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="id">
        <input type="hidden" name="is_update" value="{{ $is_update }}">
        NIM : <input type="text" name="nim" size="50" maxlength="100" />
        <br><br>Nama : <input type="text" name="nama" size="50" maxlength="150" />
        <br><br>Progdi : <select name='progdi'>
            @foreach ($optkategori as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br><br><input type="submit" name="btn_simpan" value="Simpan">
    </form>
    <br><a href="{{ url('anggota') }}">Kembali</a>
</body>

</html>
