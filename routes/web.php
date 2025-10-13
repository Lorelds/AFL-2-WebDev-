<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;




// Route untuk menampilkan semua produk
Route::get('/products', [ProductController::class, 'index'])->name('all-product.index');



Route::get('/', [ReviewController::class, 'index'])->name('homepage.index');
