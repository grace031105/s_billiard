<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [LoginController::class, 'index']);
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
