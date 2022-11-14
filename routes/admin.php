<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories', 'as' => 'categories.', 'middleware' => []], static function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/create', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])
        ->withTrashed()
        ->name('edit');
    Route::post('/{category}/edit', [CategoryController::class, 'update'])
        ->withTrashed()
        ->name('update');
});

Route::group(['prefix' => 'orders', 'as' => 'orders.', 'middleware' => []], static function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
});