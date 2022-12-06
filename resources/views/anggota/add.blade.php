<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('anggota') }}" method="POST" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="id">
        <input type="hidden" name="is_update" value="{{ $is_update }}">
        NIM : <input value="{{ old('nim') }}" type="text" name="nim" size="50" maxlength="100" />
        <br><br>Nama : <input value="{{ old('nama') }}" type="text" name="nama" size="50"
            maxlength="150" />
        <br><br>Progdi : <select name='progdi'>
            @foreach ($optkategori as $key => $value)
                @if (old('progdi') == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                @else
                    <option value="{{ $key }}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <br><br><input type="submit" name="btn_simpan" value="Simpan">
    </form>
    <br><a href="{{ url('anggota') }}">Kembali</a>
</body>

</html>
