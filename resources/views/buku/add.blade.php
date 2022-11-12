<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
</head>

<body>
    <form action="{{ url('buku/save') }}" method="POST" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="id">
        <input type="hidden" name="is_update" value="{{ $is_update }}">
        Judul : <input type="text" name="judul" size="50" maxlength="100" />
        <br><br>Pengarang : <input type="text" name="pengarang" size="50" maxlength="150" />
        <br><br>Kategori : <select name='kategori'>
            @foreach ($optkategori as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br><br><input type="submit" name="btn_simpan" value="Simpan">
    </form>
    <br><a href="{{ url('buku') }}">Kembali</a>
</body>

</html>
