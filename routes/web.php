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
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/tambah-produk', [TambahProdukController::class, 'index']);
