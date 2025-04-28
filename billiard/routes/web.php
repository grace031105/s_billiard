<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/items', [ItemController::class, 'index']);
Route::get('/logout', function () {
    return view('logout');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route untuk file bioskop
Route::get('/bioskop', function () {
    return view('bioskop');
})->name('bioskop');
// Route untuk choose seat
Route::get('/chooseseat', function () {
    return view('chooseseat');
})->name('chooseseat');
// Route untuk invoice
Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');
// Route untuk pilih
Route::get('/pilih', function () {
    return view('pilih');
})->name('pilih');
// Route untuk carousel
Route::get('/carousel', function () {
    return view('carousel');
})->name('carousel');
// Route untuk search
Route::get('/search', function () {
    return view('search');
})->name('search');
// Route untuk editprofile
Route::get('/editprofile', function () {
    return view('editprofile');
})->name('editprofile');


