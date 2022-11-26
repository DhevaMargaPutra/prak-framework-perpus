<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'mst_anggota';
    protected $primaryKey = 'ID_Anggota';
    public $timestamps = false;
    protected $fillable = ['nim', 'nama', 'progdi'];
}
