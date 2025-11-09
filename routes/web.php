<?php

use App\Http\Controllers\AllReviewController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index1'])->name('homepage.index');

Route::get('/reviews', [AllReviewController::class, 'index'])->name('reviews.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('reviews.destroy');

    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])
    ->middleware(['auth'])
    ->name('reviews.edit');

Route::patch('/reviews/{review}', [ReviewController::class, 'update'])
    ->middleware(['auth'])
    ->name('reviews.update');

    Route::middleware('auth')->group(function () {
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::post('/register', [RegisteredUserController::class, 'create'])->name('user.register');


Route::post('/register', [RegisteredUserController::class, 'store']);


Route::post('/register', [RegisteredUserController::class, 'create'])->name('login');


require __DIR__.'/auth.php';
