<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CatalogController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'catalog', 'as' => 'catalog.', 'middleware' => []], static function () {
    Route::get('/', [CatalogController::class, 'index'])->name('index');
    Route::get('/{category:slug}', [CatalogController::class, 'show'])
        ->where('category', '.*')
        ->name('show');
});