<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TambahProdukController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'index']);
Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
Route::get('admin/tambah-produk', [DashboardController::class, 'create'])->name('admin.tambah-produk');
Route::post('admin/tambah-produk/store', [DashboardController::class, 'store'])->name('admin.tambah-produk.store');
