<?php

use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use Illuminate\Routing\Router;
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

// Route::get('/', function () {
//     return view('layouts');
// });

// Route::get('/posts', function () {
//     // truy van
//     //Lay tat ca
//     // $data = Post::all();
//     //c2
//     // $data = Post::query()->get();

//     // $data=Post::query()->where('id', '>=',1)
//     // ->get();
//     //them
//     //C1
//     // $post  = new Post();
//     // $post->title = "BV 2";
//     // $post->content = "ND BV 2";
//     // $post->save();
//     //C2
//     // $post = Post::query()->create([
//     //     'title' => "BV SO 3",
//     //     'content' => "ND BV SO 3",
//     //     'name' => "phan tien dat"
//     // ]);
//     //sửa
//     //C1
//     // $post = Post::query()->find(1);
//     // $post->title = "BV 2";
//     // $post->save();
//     //C2
//     // $post = Post::query()->find(1)
//     // ->update([
//     //     'title' =>"BV 1",
//     //     'content' =>"ND BV2"
//     // ]);
//     //xóa
//     //Xoa cung
//     // $post = Post::query()->find(1)->delete();
//     // dd($data);
//     // return view('welcome');
// });

//Route::get('/products',[ProductController::class, 'index'])->name('products.index');
//Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
//
Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products/')
    ->group(function (){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')
        ->name('edit')
        ->where('id','[0-9]+');
        Route::post('/{id}/update','update')
        ->name('update')
        ->where('id','[0-9]+');
        Route::post('/{id}/destroy','destroy')
        ->name('destroy')
        ->where('id','[0-9]+');
    });

    Route::controller(CategoryController::class)
    ->name('categories.')
    ->prefix('categories/')
    ->group(function (){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')
        ->name('edit')
        ->where('id','[0-9]+');
        Route::post('/{id}/update','update')
        ->name('update')
        ->where('id','[0-9]+');
        Route::post('/{id}/destroy','destroy')
        ->name('destroy')
        ->where('id','[0-9]+');
    });