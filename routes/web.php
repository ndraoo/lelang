<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MasyarakatController::class, 'index'])->name('index.barang');
Route::get('register', [AuthController::class, 'create'])->name('register');
Route::post('register', [AuthController::class, 'store']);
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
Route::group(['middleware' => ['role:masyarakat']], function () {
    Route::resource('masyarakat', MasyarakatController::class);
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('admin', AdminController::class);
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
