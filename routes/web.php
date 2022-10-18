<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ArticleController;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'catalog', 'as' => 'catalog.', 'middleware' => []], static function () {
    Route::get('/', [CatalogController::class, 'index'])->name('index');
    Route::get('/{category:slug}', [CatalogController::class, 'show'])
        ->where('category', '.*')
        ->name('show');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.', 'middleware' => []], static function () {
    Route::get('/', [CartController::class, 'show'])->name('show');
    Route::post('/', [CartController::class, 'update'])->name('update');
});


Route::group(['prefix' => '/blog', 'as' => 'blog.'], static function () {
    Route::get('/', [RubricController::class, 'index'])->name('index');
    Route::get('/{rubric:slug}', [RubricController::class, 'show'])->name('show');
    Route::get('/{rubric:slug}/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
});
