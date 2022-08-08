<?php

use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/daftar_kelas', function () {
    return view('daftarKelas/daftar_kelas');
});

Route::get('/form_tambah_siswa', function () {
    return view('daftarSiswa/form_tambah_siswa');
});

Route::get('/daftar_kelas', [RuangKelasController::class, 'index']);
Route::post('/tambah_kelas', [RuangKelasController::class , 'store']);
Route::post('/edit_kelas/{id}', [RuangKelasController::class , 'update']);
Route::delete('/hapus_kelas/{id}', [RuangKelasController::class , 'destroy']);
Route::post('/search_kelas', [RuangKelasController::class, 'search']);
Route::get('/isi_kelas/{id_kelas}', [RuangKelasController::class, 'show']);

Route::get('/informasi_siswa/{id_siswa}', [SiswaController::class, 'index']);