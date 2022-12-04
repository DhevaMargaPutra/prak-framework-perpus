<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinjam Buku</title>
</head>

<body>
    <h2>Form Pinjam Buku</h2>
    <form action="{{ url('pinjam/save') }}" method="POST">
        @csrf
        Anggota: <select name="ID_Anggota">
            <option value="">-Pilih Anggota-</option>
            @foreach ($optanggota as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br><br>
        Buku: <select name="ID_Buku">
            <option value="">-Pilih Anggota-</option>
            @foreach ($optbuku as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br><br>Tgl. Pinjam : <input type="date" name="tgl_pinjam">
        <br><br>Tgl. Kembali : <input type="date" name="tgl_kembali">
        <br><br><input type="submit" value="Simpan">
        <input type="reset" value="Batal">
    </form>
    <br><a href="{{ url('pinjam') }}">Kembali</a>
</body>

</html>
