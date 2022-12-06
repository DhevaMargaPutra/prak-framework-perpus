<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\PinjamController;
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
    // return view('ftik');
    return redirect('perpus');
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

Route::middleware(['auth'])->group(function () {

    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/add', [BukuController::class, 'add_new']);
    Route::post('/buku/save', [BukuController::class, 'save']);

    Route::resource('/anggota', AnggotaController::class);

    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::post('/pinjam', [PinjamController::class, 'store']);

    Route::get('/perpus', [PerpusController::class, 'index']);
});

Route::get('/login', [PerpusController::class, 'login'])->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
