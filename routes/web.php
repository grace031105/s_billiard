<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPublicController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\MejaController;
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
use App\Http\Controllers\PembayaranController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login pemilik
Route::get('/pemilik', [PemilikController::class, 'showLoginForm'])->name('pemilik');
Route::post('/pemilik', [PemilikController::class, 'login'])->name('pemilik.login');
Route::post('/pemilik/logout', [PemilikController::class, 'logout'])->name('pemilik.logout');

//Route::middleware(['auth.pemilik'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
        // Kelola Meja
    Route::get('/kelola_meja', [KelolaController::class, 'show'])->name('kelola_meja');
    Route::post('/meja/simpan', [KelolaController::class, 'simpan'])->name('meja.simpan');
    Route::delete('/kelola_meja/{id_meja}', [KelolaController::class, 'delete'])->name('mejas.delete');
    Route::get('/mejas/{id_meja}/edit', [KelolaController::class, 'edit'])->name('mejas.edit');
    Route::put('/mejas/{id_meja}', [KelolaController::class, 'update'])->name('mejas.update');
    // Data Pelanggan
    // Untuk pemilik
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::post('/reservasi/simpan', [ReservasiController::class, 'store'])->name('reservasi.store');
});
Route::middleware(['auth:pemilik'])->group(function () {
    Route::get('/reservasi', [ReservasiController::class, 'show'])->name('reservasi.index');
    Route::post('/reservasi/{id}/konfirmasi', [ReservasiController::class, 'konfirmasi'])->name('reservasi.konfirmasi');
    Route::post('/reservasi/{id}/batal', [ReservasiController::class, 'batal'])->name('reservasi.batal');
});

Route::middleware(['auth:pemilik'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'show'])->name('pelanggan');
});


//});

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});

// Edit password
Route::get('/reset-password', function () {
    return view('pages.reset_password');
})->name('password.reset.form');

Route::post('/reset-password', [PasswordResetController::class, 'prosesReset'])->name('password.reset');

// Pencarian
Route::get('/cari-meja', [MejaController::class, 'cari'])->name('cari.meja');


// Dashboard & Items
Route::get('/dash-public', [DashboardPublicController::class, 'index'])->name('dash-public');
Route::get('/dash', [DashboardController::class, 'index'])->middleware('auth:pelanggan')->name('dash');

// Tampilkan form reservasi
Route::get('/meja_reguler', [MejaRegulerController::class, 'index'])->name('meja_reguler');
// Proses reservasi (INSERT)

Route::get('/details', [ReservasiController::class, 'showDetails'])->name('details');
Route::post('/details', [DetailController::class, 'store'])
    ->middleware('auth:pelanggan')
    ->name('details');
Route::post('/pembayaran/konfirmasi/{id_reservasi}', [PembayaranController::class, 'uploadBuktiPembayaran'])->name('pembayaran.konfirmasi');


Route::get('/meja_vip', [MejaVipController::class, 'index'])-> name('meja_vip');
Route::get('/meja_platinum', [MejaPlatinumController::class, 'index'])-> name('meja_platinum');


Route::get('/resi_pemesanan', [ResiController::class, 'index'])->name('resi_pemesanan');
Route::get('/resi-pdf/{id}', [ResiController::class, 'downloadPDF'])->name('resi.pdf');
Route::get('/riwayat_penyewaan', [RiwayatController::class, 'index'])-> name('riwayat_penyewaan');
Route::get('/resi_pemesanan/{id}', [ResiController::class, 'show'])->name('resi_pemesanan');



Route::post('/reservasi/simpan', [ReservasiController::class, 'store'])->name('reservasi.store');



