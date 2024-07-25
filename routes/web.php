<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::controller(ProductController::class)
    ->name('product.')
    ->prefix('product')
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit')->where('id', '[0-9]+');
        Route::patch('/update/{id}', 'update')->name('update')->where('id', '[0-9]+');

        Route::delete('/delete/{id}', 'delete')->name('delete')->where('id', '[0-9]+');
    });

Route::controller(CategoryController::class)
    ->name('category.')
    ->prefix('category')
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit')->where('id', '[0-9]+');
        Route::patch('/update/{id}', 'update')->name('update')->where('id', '[0-9]+');

        Route::delete('/delete/{id}', 'delete')->name('delete')->where('id', '[0-9]+');
    });
