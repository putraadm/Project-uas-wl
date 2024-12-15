<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    Route::get('product', [ProductController::class, 'index'])->name('kasir.product');
    // Route::get('/tambahProduct', [ProductController::class, 'create'])->name('kasir.create');
    Route::post('/tambahProduct', [ProductController::class, 'store'])->name('product.store');
    Route::post('/UpdateProduct', [ProductController::class, 'update'])->name('product.update');
    Route::get('Kategori', [KategoriController::class, 'index'])->name('kasir.kategori');
    Route::post('/tambahKategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/EditKategori', [KategoriController::class, 'store'])->name('kategori.store');
});

// owner route
Route::middleware(['auth','ownerMiddleware'])->group(function(){
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
});