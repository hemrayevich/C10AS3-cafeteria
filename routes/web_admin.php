<?php

use App\Http\Controllers\Admin\CafeteriaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\Admin\ManagerController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'staff'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('drinks', DrinkController::class)->except(['show']);

    Route::get('cafeterias/{cafeteria}/edit', [CafeteriaController::class, 'edit'])->name('cafeterias.edit');
    Route::put('cafeterias/{cafeteria}', [CafeteriaController::class, 'update'])->name('cafeterias.update');

    Route::middleware('admin')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('cafeterias', CafeteriaController::class)->except(['show', 'edit', 'update']);
        Route::resource('managers', ManagerController::class)->except(['show']);
    });
});
