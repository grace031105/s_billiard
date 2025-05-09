<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\KelolaController;


// Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard & Items
    Route::get('/dash', [DashboardController::class, 'index'])-> name('dash');


Route::get('/kelola_meja', [KelolaController::class, 'index'])-> name('kelola_meja');
Route::get('/resipenyewaan', [ResiController::class, 'showResi'])-> name('resipenyewaan');
Route::post('/resipenyewaan', [AuthController::class, 'resipenyewaan']);
// Static Pages
Route::view('/bioskop', 'bioskop')->name('bioskop');
Route::view('/chooseseat', 'chooseseat')->name('chooseseat');
Route::view('/invoice', 'invoice')->name('invoice');
Route::view('/pilih', 'pilih')->name('pilih');
Route::view('/carousel', 'carousel')->name('carousel');
Route::view('/search', 'search')->name('search');
Route::view('/editprofile', 'editprofile')->name('editprofile');
Route::view('/resipenyewaan', 'resipenyewaan')->name('resipenyewaan');
Route::view('/meja_platinum', 'meja_platinum')->name('meja_platinum');
Route::view('/meja_reguler', 'meja_reguler')->name('meja_reguler');
Route::view('/meja_vip', 'meja_vip')->name('meja_vip');
Route::view('/detail_penyewaan', 'detail_penyewaan')->name('detail_penyewaan');
Route::view('/edit_profil', 'edit_profil')->name('edit_profil');
Route::view('/riwayatpemesanan', 'riwayatpemesanan')->name('riwayatpemesanan');
//Route::view('/kelola_meja', 'kelola_meja')->name('kelola_meja');

