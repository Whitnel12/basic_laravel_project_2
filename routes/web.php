<?php

use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

// PAKET
Route::get('/',[PaketController::class, 'tampil'])->name('paket.tampil');
Route::get('/form-tambah-paket',[PaketController::class, 'form_tambah'])->name('paket.form-tambah-paket');
Route::get('/form-edit-paket/{id}',[PaketController::class, 'form_edit'])->name('paket.form-edit-paket');
Route::post('/form-tambah-paket/tambah',[PaketController::class, 'tambah'])->name('paket.form-tambah-paket.tambah');
Route::post('/form-tambah-paket/edit/{id}',[PaketController::class, 'edit'])->name('paket.form-edit-paket.edit');
Route::post('/form-tambah-paket/hapus/{id}',[PaketController::class, 'hapus'])->name('paket.form-tambah-paket.hapus');

// PESANAN 
Route::get('/pesanan', [PesananController::class, 'tampil_pesanan'])->name('pesanan.tampil');
Route::get('/form-tambah-pesanan', [PesananController::class, 'form_tambah'])->name('pesanan.form-tambah-pesanan');
Route::post('/form-tambah-pesanan/tambah', [PesananController::class, 'tambah'])->name('pesanan.form-tambah-pesanan.tambah'); 
Route::post('/pesanan/hapus/{id}', [PesananController::class, 'hapus'])->name('pesanan.hapus'); 
Route::get('/pesanan/form-edit-pesanan/{id}', [PesananController::class, 'form_edit'])->name('pesanan.form-edit-pesanan'); 
Route::post('/pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.form-edit-pesanan.edit'); 
Route::patch('/pesanan/{id}', [PesananController::class, 'updateStatus'])->name('pesanan.update-status'); 

// SESI AUTH
Route::get('/sesi', [SessionController::class, 'index'])->name('sesi');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('login');
Route::get('/sesi/form_register', [SessionController::class, 'form_register'])->name('form_register');
Route::post('/sesi/register', [SessionController::class, 'register'])->name('register');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');