<?php

namespace App\Http\Controllers;

use App\Models\Buku_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BukuController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['opt_kategori'] = [
            '' => '- Pilih Salah Satu -',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'teori' => 'Teori',
            'pemrograman' => 'Pemrograman'
        ];
    }

    public function index(Buku_m $buku)
    {
        $data = [
            'query' => $buku->get_records(),
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.list', $data);
    }

    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->data['opt_kategori']
        ];

        return view('buku.add', $data);
    }

    public function save(Buku_m $buku, Request $request)
    {
        $data = $request->all();

        $is_update = $request->input('is_update');
        Log::info('isupdate', [$is_update]);

        if ($is_update == 0) {
            $newBuku = new Buku_m();
            $newBuku->fill($data);
            $newBuku->save();
            if ($newBuku) {
                return redirect('buku');
            }
        } else {
            $id = $data['id'];
            if ($buku->update_by_id($data, $id)) {
                return redirect('buku');
            }
        }
    }

    public function edit($id, Buku_m $buku)
    {
        $data = [
            'query' => Buku_m::find($id),
            'is_update' => 1,
            'optkategori' => $this->data['opt_kategori'],
        ];
        return view('buku.edit', $data);
    }

    public function delete($id, Buku_m $buku)
    {
        if ($buku->delete_by_id($id)) {
            return redirect('buku');
        }
    }
}
