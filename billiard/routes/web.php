<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ResiController;

// Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard & Items
//Route::middleware('dashboard')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/items', [ItemController::class, 'index'])->name('items');
//});

// Static Pages
Route::view('/bioskop', 'bioskop')->name('bioskop');
Route::view('/chooseseat', 'chooseseat')->name('chooseseat');
Route::view('/invoice', 'invoice')->name('invoice');
Route::view('/pilih', 'pilih')->name('pilih');
Route::view('/carousel', 'carousel')->name('carousel');
Route::view('/search', 'search')->name('search');
Route::view('/editprofile', 'editprofile')->name('editprofile');
Route::view('/resipemesanan', 'resipemesanan')->name('resipemesanan');
