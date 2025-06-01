<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GunungController;
use App\Http\Controllers\JalurController;
use App\Http\Controllers\JadwalPendakianController;
use App\Http\Controllers\PemesananTiketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GunungController as GunungControllerAlias;

// Add GunungController here

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [AuthController::class, "register"])->name('auth.register');
Route::get('/login', [AuthController::class, "login"])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Gunung Routes
    Route::get('/gunung', [GunungController::class, 'index'])->name('gunungs.index');
    Route::get('/gunung/create', [GunungController::class, 'create'])->name('gunungs.create');
    Route::post('/gunung', [GunungController::class, 'store'])->name('gunungs.store');
    Route::get('/gunung/{id}', [GunungController::class, 'show'])->name('gunungs.show');
    Route::get('/gunung/{id}/edit', [GunungController::class, 'edit'])->name('gunungs.edit');
    Route::put('/gunung/{id}', [GunungController::class, 'update'])->name('gunungs.update');
    Route::delete('/gunung/{id}', [GunungController::class, 'destroy'])->name('gunungs.destroy');


    Route::get('/jalur', [JalurController::class, 'index'])->name('jalurs.index');
    Route::get('/jalur/create', [JalurController::class, 'create'])->name('jalurs.create');
    Route::post('/jalur', [JalurController::class, 'store'])->name('jalurs.store');
    Route::get('/jalur/{id}', [JalurController::class, 'show'])->name('jalurs.show');
    Route::get('/jalur/{id}/edit', [JalurController::class, 'edit'])->name('jalurs.edit');
    Route::put('/jalur/{id}', [JalurController::class, 'update'])->name('jalurs.update');
    Route::delete('/jalur/{id}', [JalurController::class, 'destroy'])->name('jalurs.destroy');


    Route::get('/jadwal-pendakian', [JadwalPendakianController::class, 'index'])->name('jadwal_pendakians.index');
    Route::get('/jadwal-pendakian/create', [JadwalPendakianController::class, 'create'])->name('jadwal_pendakians.create');
    Route::post('/jadwal-pendakian', [JadwalPendakianController::class, 'store'])->name('jadwal_pendakians.store');
    Route::get('/jadwal-pendakian/{id}', [JadwalPendakianController::class, 'show'])->name('jadwal_pendakians.show');
    Route::get('/jadwal-pendakian/{id}/edit', [JadwalPendakianController::class, 'edit'])->name('jadwal_pendakians.edit');
    Route::put('/jadwal-pendakian/{id}', [JadwalPendakianController::class, 'update'])->name('jadwal_pendakians.update');
    Route::delete('/jadwal-pendakian/{id}', [JadwalPendakianController::class, 'destroy'])->name('jadwal_pendakians.destroy');
    Route::get('/pemesanans', [PemesananTiketController::class, 'index'])->name('pemesanans.index');
    Route::get('/pemesanans/create', [PemesananTiketController::class, 'create'])->name('pemesanans.create');
    Route::post('/pemesanans', [PemesananTiketController::class, 'store'])->name('pemesanans.store');
    Route::get('/pemesanans/{id}', [PemesananTiketController::class, 'show'])->name('pemesanans.show');
    Route::get('/pemesanans/{id}/edit', [PemesananTiketController::class, 'edit'])->name('pemesanans.edit');
    Route::put('/pemesanans/{id}', [PemesananTiketController::class, 'update'])->name('pemesanans.update');
    Route::delete('/pemesanans/{id}', [PemesananTiketController::class, 'destroy'])->name('pemesanans.destroy');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

});
