<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories', 'as' => 'categories.', 'middleware' => []], static function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])
        ->withTrashed()
        ->name('edit');
    Route::post('/{category}/edit', [CategoryController::class, 'update'])
        ->withTrashed()
        ->name('update');

});