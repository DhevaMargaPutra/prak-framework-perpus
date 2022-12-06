<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinjam Buku</title>
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
    <h2>Form Pinjam Buku</h2>
    <form action="{{ url('pinjam') }}" method="POST">
        @csrf
        Anggota: <select name="ID_Anggota">
            <option value="">-Pilih Anggota-</option>
            @foreach ($optanggota as $value)
                @if (old('ID_Anggota') == $value['ID_Anggota'])
                    <option value="{{ $value['ID_Anggota'] }}" selected>{{ $value['nama'] }}</option>
                @else
                    <option value="{{ $value['ID_Anggota'] }}">{{ $value['nama'] }}</option>
                @endif
            @endforeach
        </select>
        <br><br>
        Buku: <select name="ID_Buku">
            <option value="">-Pilih Buku-</option>
            @foreach ($optbuku as $key => $value)
                @if (old('ID_Buku') == $value['ID_Anggota'])
                    <option value="{{ $value['ID_Buku'] }}" selected>{{ $value['Judul'] }}</option>
                @else
                    <option value="{{ $value['ID_Buku'] }}">{{ $value['Judul'] }}</option>
                @endif
            @endforeach
        </select>
        <br><br>Tgl. Pinjam : <input value="{{ old('tgl_pinjam') }}" type="date" name="tgl_pinjam">
        <br><br>Tgl. Kembali : <input value="{{ old('tgl_kembali') }}" type="date" name="tgl_kembali">
        <br><br><input type="submit" value="Simpan">
        <input type="reset" value="Batal">
    </form>
    <br><a href="{{ url()->previous() }}">Kembali</a>
</body>

</html>
