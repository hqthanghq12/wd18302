<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use \App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/posts', function () {
    // $data = Post::all();
    $data = Post::query()->get();
    //where
    $data = Post::query()->where('id', '>=' , 1)->get();
    //add
    //c1
    // $post = new Post();
    // $post->title = 'Post 4';
    // $post->content = 'Content 4';
    // $post->save();
    
    //c2
    // $post = Post::query()->create([
    //     'title' => 'Post 5',
    //     'content' => 'Content 6'
    // ]);
    //update
    //c1
    // $post = Post::query()->find(1);
    // $post->title = 'Post 1 updated';
    // $post->save();
    //c2
    // $post = Post::query()->where('id', 1)->update([
    //     'title' => 'Post 1 updated',
    //     'content' => 'Content 1 updated'
    // ]);
    //delete
    //c1
    // $post = Post::query()->find(1);
    // $post->delete();
    //c2
    // $post = Post::query()->where('id', 1)->delete();
        // dd($data);
    return view('test', compact('data'));
});

Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/update', 'update')->name('update');
        Route::post('/{id}/update', 'update')->name('update')
            ->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'delete')->name('delete')
            ->where('id', '[0-9]+');
    });

Route::controller(CategoryController::class)
    ->name('categories.')
    ->prefix('categories')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/update', 'update')->name('update');
        Route::post('/{id}/update', 'update')->name('update')
            ->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'delete')->name('delete')
            ->where('id', '[0-9]+');
    });
