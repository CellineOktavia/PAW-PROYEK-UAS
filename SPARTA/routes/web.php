<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FakturController;

Route::get('/', function () {
    return view('landing-page');
})->name('landing-page');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Product Routes
    Route::get(
        '/produk',
        [ProductController::class, 'index']
    )
        ->name('produk.index');

    Route::get(
        '/produk/create',
        [ProductController::class, 'create']
    )
        ->name('produk.create');

    Route::post(
        '/produk',
        [ProductController::class, 'store']
    )
        ->name('produk.store');

    Route::get(
        '/produk/{product}/edit',
        [ProductController::class, 'edit']
    )
        ->name('produk.edit');

    Route::put(
        '/produk/{product}',
        [ProductController::class, 'update']
    )
        ->name('produk.update');

    Route::delete(
        '/produk/{product}',
        [ProductController::class, 'destroy']
    )
        ->name('produk.destroy');

    Route::get('/supplier', [SupplierController::class, 'index'])
        ->name('supplier.index');

    Route::get('/faktur', [FakturController::class, 'index'])
        ->name('faktur.index');

    Route::get('/laporan', function () {
        return view('laporan.index');
    })->name('laporan.index');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
