<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\MejaRegulerController;
use App\Http\Controllers\MejaVipController;
use App\Http\Controllers\MejaPlatinumController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ReservasiController;

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Edit password
Route::get('/reset-password', function () {
    return view('pages.reset_password');
})->name('password.reset.form');

Route::post('/reset-password', [PasswordResetController::class, 'prosesReset'])->name('password.reset');

// Dashboard & Items
Route::get('/dash', [DashboardController::class, 'index'])-> name('dash');
Route::get('/meja_reguler', [MejaRegulerController::class, 'index'])-> name('meja_reguler');
Route::get('/details', [DetailController::class, 'index'])->name('details');
Route::get('/meja_vip', [MejaVipController::class, 'index'])-> name('meja_vip');
Route::get('/meja_platinum', [MejaPlatinumController::class, 'index'])-> name('meja_platinum');


Route::get('/kelola_meja', [KelolaController::class, 'show']);
Route::get('/resi_pemesanan', [ResiController::class, 'index'])->name('resi_pemesanan');
Route::get('/resi-pdf/{id}', [ResiController::class, 'downloadPDF'])->name('resi.pdf');
Route::get('/riwayat_penyewaan', [RiwayatController::class, 'index'])-> name('riwayat_penyewaan');
Route::get('/pelanggan', [PelangganController::class, 'show']);
Route::get('/beranda', [BerandaController::class, 'index'])-> name('beranda');
Route::get('/reservasi', [ReservasiController::class, 'show']);

Route::post('/meja/simpan', [KelolaController::class, 'simpan'])->name('meja.simpan');

// Static Pages
Route::view('/bioskop', 'bioskop')->name('bioskop');
Route::view('/chooseseat', 'chooseseat')->name('chooseseat');
Route::view('/invoice', 'invoice')->name('invoice');
Route::view('/pilih', 'pilih')->name('pilih');
Route::view('/carousel', 'carousel')->name('carousel');
Route::view('/search', 'search')->name('search');
Route::view('/editprofile', 'editprofile')->name('editprofile');
//Route::view('/resi_pemesanan', 'resi_pemesanan')->name('resi_pemesanan');
Route::view('/detail_penyewaan', 'detail_penyewaan')->name('detail_penyewaan');
Route::view('/edit_profil', 'edit_profil')->name('edit_profil');
//Route::view('/riwayat_penyewaan', 'riwayat_penyewaan')->name('riwayat_penyewaan');
//Route::view('/kelola_meja', 'kelola_meja')->name('kelola_meja');
