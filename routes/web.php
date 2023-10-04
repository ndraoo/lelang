<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AuthPetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    // Definisi route Anda di sini
});






// Route::get('/examshop', function () {
    //     return view('masyarakat.pelelangan');
    // });

    // Route::get('/login', [AuthController::class, 'create'])->name('register');
Route::post('/login', [AuthController::class, 'store'])->name('registermasyarakat');
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => ['role:masyarakat']], function () {
        Route::resource('masyarakat', MasyarakatController::class);
        Route::post('masyarakat/tambah-penawaran/{id_lelang}', [MasyarakatController::class, 'tambahPenawaran'])->name('tambah-penawaran');
        Route::get('masyarakat/tambah-penawaran/create/{id_lelang}', [MasyarakatController::class, 'createPenawaran'])->name('tambah-penawaran.create');
        Route::get('masyarakat/lelang/index', [MasyarakatController::class, 'indexPelelangan'])->name('masyarakat.lelang');
        Route::get('masyarakat/lelang/pemenang/index', [MasyarakatController::class, 'indexPemenang'])->name('masyarakat.pemenang');
        Route::get('/masyarakat/lelang/{id_lelang}/pemenang', [MasyarakatController::class, 'pemenang'])->name('masyarakat.pemenang-tertinggi');
    });

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('admin', AdminController::class);
    Route::get('admin/lelang/index', [LelangController::class, 'index'])->name('admin.lelang.index');
    Route::get('/admin/lelang/create', [LelangController::class, 'create'])->name('admin.lelang.create');
    Route::post('admin/lelang', [LelangController::class, 'store'])->name('admin.lelang.store');
    Route::delete('/admin/lelang/{id_lelang}', [LelangController::class, 'destroy'])->name('admin.lelang.destroy');
    Route::post('/toggle-lelang/{id_lelang}', [LelangController::class, 'toggleLelang']);
    Route::get('/validate-lelang/{id_lelang}', [LelangController::class, 'validateLelang']);
    Route::get('/admin/lelang/{id_lelang}/pilih-pemenang', [LelangController::class, 'showPilihPemenangForm'])->name('admin.lelang.pilih-pemenang-form');


    Route::get('admin/barang/index', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::get('/admin/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::post('/admin/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/admin/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    Route::post('/admin/register', 'App\Http\Controllers\AuthPetugasController@store')->name('register.petugas.admin');
    Route::get('/admin/petugas/register', [AuthPetugasController::class, 'create'])->name('admin.petugas.register');
    Route::get('admin/petugas/index', [AuthPetugasController::class, 'index'])->name('admin.petugas.index');
    Route::get('/admin/petugas/{id}/edit', [AuthPetugasController::class, 'edit'])->name('admin.petugas.edit');
    Route::put('/admin/petugas/{id}', [AuthPetugasController::class, 'update'])->name('admin.petugas.update');
    Route::delete('/admin/petugas/{id}', [AuthPetugasController::class, 'destroy'])->name('admin.petugas.destroy');
});

Route::group(['middleware' => ['role:petugas']], function () {
    Route::resource('petugas', PetugasController::class);
    Route::get('petugas/barang/index', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/petugas/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/petugas/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/petugas/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/petugas/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/petugas/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

});
