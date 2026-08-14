<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CafeteriaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::name('client.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::controller(CafeteriaController::class)->group(function () {
        Route::get('/cafeterias', 'index')->name('cafeterias.index');
        Route::get('/cafeterias/{id}', 'show')->name('cafeterias.show');
        Route::get('/vipCafeterias', 'vipCafeterias')->name('cafeterias.vipCafeterias');
        Route::get('/latestCafeterias', 'latestCafeterias')->name('cafeterias.latestCafeterias');
    });

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/search', [DrinkController::class, 'search'])->name('drinks.search');

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

});