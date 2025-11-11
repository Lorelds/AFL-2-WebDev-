<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AllReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', [ProductController::class, 'index1'])->name('homepage.index');

Route::get('/reviews', [AllReviewController::class, 'index'])->name('reviews.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(Admin::class)
    ->name('admin.page');

Route::patch('/admin/{id}', [AdminController::class, 'update'])->name('products.update');

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::post('/', [AdminController::class, 'store'])->name('admin.store');




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
