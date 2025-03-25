<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('customer.index');
})->name('beranda');


Route::get('/operator_cabang/user', [UserController::class, 'index'])->name('operator_cabang.user');
Route::get('operator_cabang/user/create', [UserController::class, 'create'])->name('operator_cabang.user.create');
Route::get('operator_cabang/user/edit', [UserController::class, 'edit'])->name('operator_cabang.user.edit');
Route::delete('operator_cabang/user/{id}', [UserController::class, 'destroy'])->name('operator_cabang.user.destroy');

Route::middleware(['auth', 'role:operator_cabang'])->prefix('operator_cabang')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('operator.dashboard');
});

Route::middleware(['auth', 'role:bag_pelaksanaan_cabang'])->prefix('bag_pelaksanaan_cabang')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('bag_pelaksanaan_cabang.dashboard');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {

});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/submit', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register/submit', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
