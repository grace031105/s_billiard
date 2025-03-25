<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;

Route::get('/login', [LoginController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
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
