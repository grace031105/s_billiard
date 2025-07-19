<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
use App\Http\Controllers\KeranjangController;
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
use App\Http\Controllers\KategoriController;

Route::get('/cek-guard', function () {
    if (Auth::guard('pemilik')->check()) {
        return 'Login sebagai pemilik';
    }

    if (Auth::guard('pelanggan')->check()) {
        return 'Login sebagai pelanggan';
    }

    return 'Belum login';
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login pemilik
Route::get('/pemilik', [PemilikController::class, 'showLoginForm'])->name('pemilik');
Route::post('/pemilik', [PemilikController::class, 'login'])->name('pemilik.login');
Route::post('/pemilik/logout', [PemilikController::class, 'logout'])->name('pemilik.logout');

Route::middleware(['auth:pemilik'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/kelola_meja', [KelolaController::class, 'show'])->name('kelola_meja');
    Route::post('/meja/simpan', [KelolaController::class, 'simpan'])->name('meja.simpan');
    Route::delete('/kelola_meja/{id_meja}', [KelolaController::class, 'delete'])->name('mejas.delete');
    Route::get('/mejas/{id_meja}/edit', [KelolaController::class, 'edit'])->name('mejas.edit');
    Route::put('/kelola_meja/{id}', [KelolaController::class, 'update'])->name('mejas.update');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/reservasi', [ReservasiController::class, 'show'])->name('reservasi.index');
    Route::post('/reservasi/{id}/konfirmasi', [ReservasiController::class, 'konfirmasi'])->name('reservasi.konfirmasi');
    Route::post('/reservasi/{id}/batal', [ReservasiController::class, 'batal'])->name('reservasi.batal');
    Route::get('/kelola-pelanggan', [PelangganController::class, 'show'])->name('pemilik.pelanggan');
});
    // Data Pelanggan
    // Untuk pemilik
//Route::middleware(['auth:pelanggan'])->group(function () {
    //Route::post('/reservasi/simpan', [ReservasiController::class, 'store'])->name('reservasi.store');
//});
//Route::middleware(['auth:pemilik'])->group(function () {
    //Route::get('/reservasi', [ReservasiController::class, 'show'])->name('reservasi.index');
    //Route::post('/reservasi/{id}/konfirmasi', [ReservasiController::class, 'konfirmasi'])->name('reservasi.konfirmasi');
    //Route::post('/reservasi/{id}/batal', [ReservasiController::class, 'batal'])->name('reservasi.batal');
//});

// Register/Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Dashboard umum
Route::get('/dash-public', [DashboardPublicController::class, 'index'])->name('dash-public');

// Meja list
Route::get('/meja_reguler', [MejaRegulerController::class, 'index'])->name('meja_reguler');
Route::get('/meja_vip', [MejaVipController::class, 'index'])->name('meja_vip');
Route::get('/meja_platinum', [MejaPlatinumController::class, 'index'])->name('meja_platinum');

Route::middleware(['auth:pelanggan'])->group(function () {
    // Dashboard pelanggan
    Route::get('/dash', [DashboardController::class, 'index'])->name('dash');

    // Profil pelanggan
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

    // Reset password
    Route::get('/reset-password', fn() => view('pages.reset_password'))->name('password.reset.form');
    Route::post('/reset-password', [PasswordResetController::class, 'prosesReset'])->name('password.reset');

    Route::get('/cari-meja', [MejaController::class, 'cari'])->name('cari.meja');

    // Keranjang
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::post('/keranjang/hapus', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::get('/keranjang/data', fn() => response()->json(session('keranjang', [])))->name('keranjang.data');
    

    // Reservasi
    Route::get('/reservasi/detail', [ReservasiController::class, 'lanjutkan'])->name('reservasi.lanjutkan');
    Route::post('/details', [DetailController::class, 'store'])->name('details');
    Route::get('/details', [ReservasiController::class, 'showDetails'])->name('pelanggan.details');
    Route::get('/cek-jadwal', [DetailController::class, 'cekJadwal'])->name('cek.jadwal');
    Route::get('/get-waktu', function () {
    return WaktuSewa::all();
    });
    Route::post('/reservasi/batalkan/{id}', [DetailController::class, 'batalkan'])->name('reservasi.batal');
    Route::get('/riwayat', [App\Http\Controllers\PelangganController::class, 'riwayat'])
        ->name('pelanggan.riwayat');

    //jadwal
    Route::get('/cek-jadwal', function (Request $request) {
    $tanggal = $request->query('tanggal');
    $noMeja = $request->query('no_meja');

    $meja = \App\Models\Meja::where('nama_meja', $noMeja)->first();
    if (!$meja) return response()->json(['booked' => []]);

    $reservasi = \App\Models\Reservasi::where('id_meja', $meja->id_meja)
        ->where('tanggal_reservasi', $tanggal)
        ->whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi'])
        ->pluck('id_waktu');

    return response()->json(['booked' => $reservasi->toArray()]);
});


    // Pembayaran
    Route::post('/pembayaran/konfirmasi/{id_reservasi}', [PembayaranController::class, 'uploadBuktiPembayaran'])->name('pembayaran.konfirmasi');

    // Riwayat & Resi
    Route::get('/riwayat_penyewaan', [RiwayatController::class, 'index'])->name('riwayat_penyewaan');
    Route::get('/resi_pemesanan', [ResiController::class, 'index'])->name('resi_pemesanan');
    Route::get('/resi_pemesanan/transaksi/{id_transaksi}', [ResiController::class, 'show'])->name('resi.dari_transaksi');
    Route::get('/resi-pdf/{id}', [ResiController::class, 'downloadPDF'])->name('resi.pdf');

    // Akses detail meja
    Route::get('/meja_reguler/{id}', [MejaController::class, 'reguler'])->name('meja_reguler.detail');
    Route::get('/meja_vip/{id}', [MejaController::class, 'vip'])->name('meja_vip.detail');
    Route::get('/meja_platinum/{id}', [MejaController::class, 'platinum'])->name('meja_platinum.detail');
});
