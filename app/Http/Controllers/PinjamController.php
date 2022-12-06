<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku_m;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        $buku = Buku_m::all();

        $data = [
            'optanggota' => $anggota,
            'optbuku' => $buku,
        ];

        return view('pinjam.add', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $pinjam = new Pinjam();
        $pinjam->fill($data);
        $pinjam->save();
    }
}
