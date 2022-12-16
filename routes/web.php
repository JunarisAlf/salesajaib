<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SalesAuthController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/masuk', function () {
    return view('admin.login');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/properti/tambah-properti', function () {
    return view('admin.properti.tambah-properti');
});
Route::get('/admin/properti/list-properti', function () {
    return view('admin.properti.lihat-semua-properti');
});
Route::get('/admin/marketing/list-marketing', function () {
    return view('admin.marketing.lihat-semua-marketing');
});
Route::get('/admin/penjualan/tambah-data-penjualan', function () {
    return view('admin.penjualan.tambah');
});
Route::get('/admin/penjualan/riwayat-penjualan', function () {
    return view('admin.penjualan.riwayat-penjualan');
});
Route::get('/admin/profil/lihat', function () {
    return view('admin.profil.lihat');
});
Route::get('/admin/profil/edit', function () {
    return view('admin.profil.edit');
});

Route::get('/sales/masuk', function () {
    return view('marketer.login');
});

Route::get('/sales', function () {
    return view('marketer.index');
});

Route::prefix('sales')->group(function () {
    Route::view('/daftar', 'marketer.register');
    Route::post('/', [SalesAuthController::class, 'register'])->name('sales.register');
});