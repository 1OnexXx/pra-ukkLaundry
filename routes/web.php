<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisLayananController;

Route::get('/', function () {
    return view('customer.index');
})->name('beranda');



Route::middleware(['auth', 'role:operator_cabang'])->prefix('operator_cabang')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('operator_cabang.dashboard');

    Route::get('/user', [UserController::class, 'index'])->name('operator_cabang.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('operator_cabang.user.create');
    Route::post('/user', [UserController::class, 'store'])->name('operator_cabang.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('operator_cabang.user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('operator_cabang.user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('operator_cabang.user.destroy');

    Route::get('/jenis-layanan', [JenisLayananController::class, 'index'])->name('operator_cabang.jenis-layanan.index');  
    Route::get('/jenis-layanan/create', [JenisLayananController::class, 'create'])->name('operator_cabang.jenis-layanan.create');
    Route::post('/jenis-layanan', [JenisLayananController::class, 'store'])->name('operator_cabang.jenis-layanan.store');
    Route::get('/jenis-layanan/edit/{id}', [JenisLayananController::class, 'edit'])->name('operator_cabang.jenis-layanan.edit');
    Route::put('/jenis-layanan/update/{id}', [JenisLayananController::class, 'update'])->name('operator_cabang.jenis-layanan.update');
    Route::delete('/jenis-layanan/{id}', [JenisLayananController::class, 'destroy'])->name('operator_cabang.jenis-layanan.destroy');
});

Route::middleware(['auth', 'role:bag_pelaksanaan_cabang'])->prefix('bag_pelaksanaan_cabang')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('bag_pelaksanaan_cabang.dashboard');
});

Route::middleware(['auth', 'role:direktur'])->prefix('direktur')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('direktur.dashboard');

    Route::get('/cabang', [CabangController::class, 'index'])->name('direktur.cabang.index');
    Route::get('/cabang/create', [CabangController::class, 'create'])->name('direktur.cabang.create');
    Route::post('/cabang', [CabangController::class, 'store'])->name('direktur.cabang.store');
    Route::get('/cabang/edit/{id}', [CabangController::class, 'edit'])->name('direktur.cabang.edit');
    Route::put('/cabang/update/{id}', [CabangController::class, 'update'])->name('direktur.cabang.update');
    Route::delete('/cabang/{id}', [CabangController::class, 'destroy'])->name('direktur.cabang.destroy');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {

});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/submit', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register/submit', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register/director', [AuthController::class, 'showDirectorRegisterForm'])->name('director.register');
Route::post('/register/director', [AuthController::class, 'registerDirector'])->name('director.register.submit');
