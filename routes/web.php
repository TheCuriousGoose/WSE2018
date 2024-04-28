<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PreOrderController as AuthPreOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');

Route::post('pre-order', [PreOrderController::class, 'store'])->name('pre-order.store');

Route::get('/admin-area', [AdminController::class, 'index'])->name('admin-area.index');

Route::prefix('admin')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware(Auth::class)->group(function () {
        Route::get('/pre-orders', [AuthPreOrderController::class, 'index'])->name('auth.pre-orders.index');
        Route::get('/pre-orders/{preOrder}', [AuthPreOrderController::class, 'edit'])->name('auth.pre-orders.edit');
        Route::put('/pre-orders/{preOrder}', [AuthPreOrderController::class, 'update'])->name('auth.pre-orders.update');
    });
});
