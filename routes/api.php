<?php

use App\Http\Controllers\NavItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('nav-items', [NavItemController::class, 'navItems'])->name('nav-items');
