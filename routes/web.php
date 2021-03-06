<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autenticate;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Pelanggan;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Transaksi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Publis Router
Route::get('/', [Autenticate::class, 'index']);
Route::post('/autentication', [Autenticate::class, 'store']);

// Private Router
Route::middleware('Autenticate')->prefix('admin')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);
    Route::get('/logout', [Autenticate::class, 'logout']);

    // Pelanggan
    Route::get('/pelanggan', [Pelanggan::class, 'index']);
    Route::get('/add/pelanggan', [Pelanggan::class, 'create']);
    Route::post('store/pelanggan', [Pelanggan::class, 'store']);
    Route::get('destroy/pelanggan/{id}', [Pelanggan::class, 'destroy']);
    Route::get('edit/pelanggan/{id}', [Pelanggan::class, 'edit']);
    Route::post('update/pelanggan', [Pelanggan::class, 'update']);

    // Barangs
    Route::get('/barang', [Barang::class, 'index']);
    Route::get('/add/barang', [Barang::class, 'create']);
    Route::post('store/barang', [Barang::class, 'store']);
    Route::get('destroy/barang/{id}', [Barang::class, 'destroy']);
    Route::get('edit/barang/{id}', [Barang::class, 'edit']);
    Route::post('update/barang', [Barang::class, 'update']);

    // Transaksi
    Route::get('/transaksi', [Transaksi::class, 'index']);
    Route::get('/add/transaksi', [Transaksi::class, 'create']);
    Route::post('store/transaksi', [Transaksi::class, 'store']);
    Route::get('destroy/transaksi/{id}', [Transaksi::class, 'destroy']);
    Route::get('edit/transaksi/{id}', [Transaksi::class, 'edit']);
    Route::post('update/transaksi', [Transaksi::class, 'update']);
});
