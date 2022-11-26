<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('ftik');
});

Route::get('/info', function () {
    return view('info', ['progdi' => 'SI']);
});

Route::get('/info/{kd}', [InfoController::class, 'infoMhs']);

// Route::get('/buku', function () {
//     return view('buku.add', [
//         'is_update' => 0,
//         'optkategori' => [
//             '' => '- Pilih Salah Satu -',
//             'novel' => 'Novel',
//             'komik' => 'Komik',
//             'kamus' => 'Kamus',
//             'program' => 'Pemrograman'
//         ]
//     ]);
// });

Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/add', [BukuController::class, 'add_new']);
Route::post('/buku/save', [BukuController::class, 'save']);

Route::resource('/anggota', AnggotaController::class);
