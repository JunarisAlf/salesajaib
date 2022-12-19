<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\SalesAuthController;
use App\Http\Controllers\PropertyController;

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


Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::middleware('guest')->withoutMiddleware('auth.admin')->group(function () {
        Route::view('/daftar', 'admin.register')->name('admin.registerView');
        Route::view('/masuk', 'admin.login')->name('admin.loginView');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    });
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    
    Route::prefix('/properti')->group(function () {
        Route::view('/tambah-properti', 'admin.properti.tambah-properti')
            ->name('admin.createProperty');
        Route::post('', [PropertyController::class, 'store'])
            ->name('admin.storeProperty');
        Route::get('/list-properti', [PropertyController::class, 'index'])
            ->name('admin.showAllProperty');

    });
    
});

Route::prefix('sales')->middleware('auth.sales')->group(function () {
    Route::middleware('guest')->withoutMiddleware('auth.sales')->group(function () {
        Route::view('/daftar', 'marketer.register')->name('sales.registerView');
        Route::view('/masuk', 'marketer.login')->name('sales.loginView');
        Route::post('/register', [SalesAuthController::class, 'register'])->name('sales.register');
        Route::post('/login', [SalesAuthController::class, 'login'])->name('sales.login');
    });
    Route::get('/logout', [SalesAuthController::class, 'logout'])->name('sales.logout');
    Route::view('/dashboard', 'marketer.dashboard')->name('sales.dashboard');

});