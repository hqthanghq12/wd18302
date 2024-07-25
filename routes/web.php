<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;
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
    // truy vấn
    // Lấy tất cả
//    $data = Post::all();
    // c2
    $data = Post::query()->get();
    // where
    $data = Post::query()
        ->where('id', '>=', 1)
        ->get();
    // Them
    // C1
//        $post = new Post();
//        $post->title = "BV 2";
//        $post->content = "ND BV so 2";
//        $post->save();
//        C2
//    $post = Post::query()->create([
//        'title' => "BV so 3",
//        'content' => "ND BV so 3",
//        'name' => "Nguyen Van A"
//    ]);
    // Sua
    // C1
//    $post = Post::query()->find(1);
//    $post->title = "BV 2";
//    $post->save();
//    C2
    $post = Post::query()->find(1)
        ->update([
            'title' => "BV so 3",
            'content' => "ND BV so 3"
        ]);
    // Xoa
//  Cung
    $post = Post::query()->find(1)->delete();
    dd($data);
//    return view('welcome');
});
route::controller(ProductController::class)->name('products.')->prefix('products/')->group(function(){
    route::get('/','index')->name('index');
    route::get('/create','create')->name('create');
    route::post('/store','store')->name('store');
    route::get('/{id}/edit','edit')->name('edit')->where('id','[0-9]+');
    route::put('/{id}/update','update')->name('update')->where('id','[0-9]+');
    route::delete('/{id}/destroy','destroy')->name('destroy')->where('id','[0-9]+');
});

route::controller(CategoryController::class)->name('cate.')->prefix('cate/')->group(function(){
    route::get('/','index')->name('index');
    route::get('/create','create')->name('create');
    route::post('/store','store')->name('store');
    route::get('/{id}/edit','edit')->name('edit')->where('id','[0-9]+');
    route::put('/{id}/update','update')->name('update')->where('id','[0-9]+');
    route::delete('/{id}/destroy','destroy')->name('destroy')->where('id','[0-9]+');
});
