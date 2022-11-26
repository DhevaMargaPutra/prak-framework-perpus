<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['opt_kategori'] = [
            '' => '- Pilih Salah Satu -',
            'TI' => 'Teknik Informatika',
            'SI' => 'Sistem Informasi',
            'IK' => 'Ilmu Komunikasi',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'query' => Anggota::all(),
            'optkategori' => $this->data['opt_kategori']
        ];

        return view('anggota.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->data['opt_kategori']
        ];

        return view('anggota.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $is_update = $request->input('is_update');

        if ($is_update == 0) {
            $anggota = new Anggota();
            $anggota->fill($data);
            $anggota->save();
            if ($anggota) {
                return redirect('anggota');
            }
        } else {
            $id = $data['id'];
            $anggota = Anggota::find($id);
            $anggota->fill($data);
            $anggota->save();
            return redirect('anggota');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'query' => Anggota::find($id),
            'is_update' => 1,
            'optkategori' => $this->data['opt_kategori'],
        ];
        return view('anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $anggota = Anggota::find($id);
        $anggota->fill($input);
        $anggota->save();
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index');
    }
}
