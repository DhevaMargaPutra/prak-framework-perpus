<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_m extends Model
{
    use HasFactory;

    protected $table = 'mst_buku';
    protected $primaryKey = 'ID_Buku';
    public $timestamps = false;
    protected $fillable = ['Judul', 'Pengarang', 'Kategori'];

    function get_records(){
        $result = self::all()->get();

        return $result;
    }

    function get_record($id){
        $result = self::all()->first();

        return $result;
    }

    function insert_record($data) {
        $result = self::insert($data);
        return $result;
    }

    function update_by_id($data, $id) {
        $result = self::find($id);
        $result->update($data);
        return $result;
    }

    function delete_by_id($id){
        $result = self::where('ID_Buku', $id)->delete();
        return $result;
    }
}
