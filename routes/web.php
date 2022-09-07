<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login']);

Route::post('/loginAuth', [AuthController::class, 'loginAuth']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register_auth', [AuthController::class, 'registerStore']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('role:admin')->group(function (){
    
    Route::get('/daftar_kelas', function () {
        return view('daftarKelas/daftar_kelas');
    });
    
    Route::get('/data_absen', [AbsenController::class, 'absenHariIni']);
    
    Route::get('/daftar_kelas', [RuangKelasController::class, 'index']);
    Route::post('/tambah_kelas', [RuangKelasController::class , 'store']);
    Route::post('/edit_kelas/{id}', [RuangKelasController::class , 'update']);
    Route::delete('/hapus_kelas/{id}', [RuangKelasController::class , 'destroy']);
    Route::post('/search_kelas', [RuangKelasController::class, 'search']);
    Route::get('/isi_kelas/{id_kelas}', [RuangKelasController::class, 'show']);
    
    Route::get('/informasi_siswa/{id_siswa}', [SiswaController::class, 'index']);
    
    Route::post('/tambah_jadwal', [AbsenController::class , 'store']);

    Route::get('/jadwal_absen/{id_kelas}', [JadwalController::class, 'index']);
    Route::post('/tambah_jadwal/{id_kelas}/{hari}', [JadwalController::class, 'store']);
    Route::post('/edit_jadwal/{id_kelas}/{id}', [JadwalController::class, 'update']);
    Route::delete('/hapus_jadwal/{id_kelas}/{id}', [JadwalController::class, 'destroy']);
    
    Route::get('/dataJadwalIni/{id_kelas}/{id_jadwal}', [AbsenController::class, 'dataJadwalIni']);


    Route::get('/form_tambah_siswa/{id_kelas}', [SiswaController::class, 'pageTambahSiswa']);
    Route::post('/tambah_siswa/{id_kelas}', [SiswaController::class, 'store']);
    Route::post('/search_siswa/{id_kelas}', [SiswaController::class, 'search']);


    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware('role:siswa')->group(function (){
    Route::get('/dashboardSiswa', [SiswaController::class, 'dashboard']);

    Route::post('/absenSekarang/{id_mapel}/{id_siswa}', [AbsenController::class, 'absenSekarang']);
});