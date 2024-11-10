<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/user/profile', [UserController::class, 'index']);
Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
Route::get('admin/tambah-produk', [DashboardController::class, 'create'])->name('admin.tambah-produk');
Route::post('admin/tambah-produk/store', [DashboardController::class, 'store'])->name('admin.tambah-produk.store');
Route::get('admin/edit-produk/{id}', [DashboardController::class, 'edit'])->name('admin.edit-produk');
Route::post('admin/update-produk/{id}', [DashboardController::class, 'update'])->name('admin.update-produk');