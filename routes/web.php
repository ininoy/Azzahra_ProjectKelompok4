<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Halaman Pelanggan (Bisa diakses umum & pelanggan)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/beli-produk', [OrderController::class, 'store'])->name('order.store');

// Halaman Autentikasi (Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Khusus Admin (Dilindungi middleware auth & is_admin)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/pelanggan', PelangganController::class);
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/product', ProductController::class);

    Route::get('/admin/penjualan', [OrderController::class, 'index'])->name('order.index');
    Route::patch('/admin/penjualan/{order}/status', [OrderController::class, 'updateStatus'])->name('order.status');
});
