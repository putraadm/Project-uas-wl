<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// kasir route
Route::middleware(['auth','kasirMiddleware'])->group(function(){
    Route::get('dashboard', [KasirController::class, 'index'])->name('dashboard');
    // Route::get('/tambahProduct', [ProductController::class, 'create'])->name('kasir.create');
    
    // Product
    Route::get('Product', [ProductController::class, 'index'])->name('kasir.product');
    Route::post('/tambahProduct', [ProductController::class, 'store'])->name('product.store');
    Route::get('/Product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/Product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/Delete/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    
    // Kategori
    Route::get('Kategori', [KategoriController::class, 'index'])->name('kasir.kategori');
    Route::post('/tambahKategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/Delete/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/tambah', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/Delete/order/{id}', [OrderController::class, 'destroy'])->name('order.delete');
    // Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    // Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
});

// owner route
Route::middleware(['auth','ownerMiddleware'])->group(function(){
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::get('/Laporan', [LaporanController::class, 'index'])->name('owner.laporan');
    Route::get('/report/export-pdf', [OrderController::class, 'exportPdf'])->name('report.exportPdf');
    // laporan
    Route::get('/chart', [OrderController::class, 'chart'])->name('laporan.chart');
    Route::get('/grafik-chart', [OrderController::class, 'grafik'])->name('owner.chart');
});