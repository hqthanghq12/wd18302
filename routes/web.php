<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
Route::get('posts/', function () {
    //truy vấn
    //lấy tất cả
    //$data = Post::all();
    //c2
    $data = Post::query()->get();

    //where
    // $data = Post::query()
    //     ->where('id', '>=', 1)
    //     ->get();

    //them
    //c1
    // $post = new Post();
    // $post->title = "Bv 2";
    // $post->content = "ND BV SO 2";
    // $post->save();
    //c2 - form
    // $post = Post::query()->create([
    //     'title' => "BV SO 3",
    //     'content' => "ND bai viet so 3"
    // ]);

    //sua
    //c1
    // $post = Post::query()->find(3);
    // $post->title = "BV SO 3";
    // $post->content = "ND BV so 3 nay";
    // $post->save();
    //c2
    // $post = Post::query()->find(4)
    //     ->update([
    //         'title' => "bv so 4",
    //         'content' => "nd bai viet so 4"
    //     ]);
    //xoa
    //cứng
    //$post = Post::query()->find(4)->delete();

    dd($data);
    // return view('welcome');
});
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
//
Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products/')
    ->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')
        ->name('edit')
        ->where('id','[0-9]+');
        Route::put('/{id}/update','update')
        ->name('update')
        ->where('id','[0-9]+');
        Route::delete('/{id}/destroy','destroy')
        ->name('destroy')
        ->where('id','[0-9]+');
    });
