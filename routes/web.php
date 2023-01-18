<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\SalesAuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Models\User;

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
    return redirect()->route('sales.loginView');
});
// affiliate
Route::get('/aff/{sales}/{prop}', [HistoryController::class, 'click'])->name('affiliate');
Route::get('/form/{sales}/{prop}', [HistoryController::class, 'form'])->name('affiliateForm');
// submit
// Route::get('/submit/{prop}', [HistoryController::class, 'submitView'] )->name('customer.submitView');
Route::post('/submit/{prop}', [HistoryController::class, 'submit'])->name('customer.submit');
// properti
Route::get('/properti/{prop}', [PropertyController::class, 'showOne'])->name('customer.showOneProp');


// Route::get('/admin/marketing/list-marketing', function () {
//     return view('admin.marketing.lihat-semua-marketing');
// });
// Route::get('/admin/penjualan/tambah-data-penjualan', function () {
//     return view('admin.penjualan.tambah');
// });
// Route::get('/admin/penjualan/riwayat-penjualan', function () {
//     return view('admin.penjualan.riwayat-penjualan');
// });
// Route::get('/admin/profil/lihat', function () {
//     return view('admin.profil.lihat');
// });
// Route::get('/admin/profil/edit', function () {
//     return view('admin.profil.edit');
// });


Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::middleware('guest')->withoutMiddleware('auth.admin')->group(function () {
        Route::view('/daftar', 'admin.register')->name('admin.registerView');
        Route::view('/masuk', 'admin.login')->name('admin.loginView');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    });
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    Route::prefix('/properti')->group(function () {
        Route::view('/tambah-properti', 'admin.properti.tambah-properti')
            ->name('admin.createProperty');
        Route::post('', [PropertyController::class, 'store'])
            ->name('admin.storeProperty');
        Route::get('/list-properti', [PropertyController::class, 'index'])
            ->name('admin.showAllProperty');
        Route::delete('/{prop}', [PropertyController::class, 'destroy'])
            ->name('admin.deleteProperty');
        Route::get('/{prop}', [PropertyController::class, 'edit'])->name('admin.editView');
        Route::patch('/{prop}', [PropertyController::class, 'update'])->name('admin.updateProperty');
        Route::patch('/baner/{prop}', [PropertyController::class, 'updateBaner'])
            ->name('admin.updateBanerProperty');
    });
    Route::prefix('/marketing')->group(function () {
        Route::get('/list-marketing', [SalesController::class, 'showAll'])
            ->name('admin.showAllSales');
        Route::get('/cek-affiliate', [SalesController::class, 'checkAffView'])
            ->name('admin.checkAffView');
        Route::post('/cek-affiliate', [SalesController::class, 'checkAff'])
            ->name('admin.checkAff');
    });
    Route::prefix('/penjualan')->group(function () {
        Route::get('/tambah-data-penjualan', [TransactionController::class, 'create'])
            ->name('admin.createTransaction');
        // Route::post('/tambah-data-penjualan-validation', [TransactionController::class, 'storeValidation'])->name('admin.storeTrxValidation');
        Route::post('/tambah-data-penjualan', [TransactionController::class, 'store'])
            ->name('admin.storeTransaction');
        Route::get('/riwayat-penjualan', [TransactionController::class, 'showAll'])
            ->name('admin.showAllTransaction');
    });
    Route::prefix('/profil')->group(function () {
        Route::get('/lihat', [AdminController::class, 'index'])
            ->name('admin.profile.index');
        Route::get('/update', [AdminController::class, 'edit'])
            ->name('admin.profile.edit');
        Route::patch('/update', [AdminController::class, 'update'])
            ->name('admin.profile.update');
        Route::get('/foto', [AdminController::class, 'updatePictView'])
            ->name('admin.profile.updatePictView');
        Route::patch('/foto', [AdminController::class, 'updatePict'])
            ->name('admin.profile.updatePict');
        Route::view('/update-password', 'admin.profil.update-password')
            ->name('admin.profile.updatePWView');
        Route::patch('/update-password', [AdminController::class, 'updatePW'])
            ->name('admin.profile.updatePW');
    });
    
});

Route::prefix('sales')->middleware(['auth.sales', 'is_verified'])->group(function () {
    Route::middleware('guest')->withoutMiddleware(['auth.sales', 'is_verified'])->group(function () {
        Route::view('/daftar', 'marketer.register')->name('sales.registerView');
        Route::view('/masuk', 'marketer.login')->name('sales.loginView');
        Route::post('/register', [SalesAuthController::class, 'register'])->name('sales.register');
        Route::post('/login', [SalesAuthController::class, 'login'])->name('sales.login');
        Route::view('/forgot-password', 'marketer.forgot-password')->name('sales.forgotPwView');
        Route::post('/forgot-password', [SalesAuthController::class, 'forgot'])->name('sales.forgotPw');
        Route::get('/forgot-password/verify', [SalesAuthController::class, 'forgotPwVerifyView'])->name('sales.forgotPwVerifyView');
        Route::post('/forgot-password/verify', [SalesAuthController::class, 'forgotVerify'])->name('sales.forgotPwVerify');
        // sendOTP
        Route::get('/otp/send', [SalesAuthController::class, 'sendOTP'])->name('sales.sendOTP');

    });
    Route::withoutMiddleware('is_verified')->group(function(){
        Route::view('/verify', 'marketer.verify')->name('sales.verifyView');
        Route::post('/verify', [SalesAuthController::class, 'verify'])->name('sales.verify');
        Route::view('/verify-update', 'marketer.verify-update')->name('sales.verifyUpdateView');
        Route::put('/verify-update', [SalesAuthController::class, 'verifyUpdate'])->name('sales.verifyUpdate');
    });

    Route::get('/logout', [SalesAuthController::class, 'logout'])->name('sales.logout');
    Route::get('/dashboard', [HomeController::class, 'salesHome'])->name('sales.dashboard');
    Route::get('properti/list-properti', [PropertyController::class, 'indexSales'])
        ->name('sales.showAllProperty');
    Route::get('penjualan/riwayat-submit', [HistoryController::class, 'submitHistories'])
        ->name('sales.showSubmitHistories');    
    Route::get('penjualan/riwayat-penjualan', [TransactionController::class, 'showForSales'])
        ->name('sales.showAllTransaction');
    Route::prefix('/profil')->group(function () {
        Route::get('/lihat', [SalesController::class, 'index'])
            ->name('sales.profile.index');
        Route::get('/update', [SalesController::class, 'edit'])
            ->name('sales.profile.edit');
        Route::patch('/update', [SalesController::class, 'update'])
            ->name('sales.profile.update');
        Route::get('/foto', [SalesController::class, 'updatePictView'])
            ->name('sales.profile.updatePictView');
        Route::patch('/foto', [SalesController::class, 'updatePict'])
            ->name('sales.profile.updatePict');
        Route::view('/update-password', 'marketer.profil.update-password')
            ->name('sales.profile.updatePWView');
        Route::patch('/update-password', [SalesController::class, 'updatePW'])
            ->name('sales.profile.updatePW');
    });
});