<?php
// Path: routes/web.php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DashboardController;

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

// Public landing page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Protected routes — hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Dashboard utama setelah login
    Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware('auth')
     ->name('dashboard');

    // Profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Modul Manajemen Paket Internet (CRUD tanpa show)
    Route::resource('packages', PackageController::class)
         ->except(['show']);

    // Modul Manajemen Pelanggan (CRUD tanpa show)
    Route::resource('customers', CustomerController::class)
         ->except(['show']);
});
