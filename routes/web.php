<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('admin.index');
});
Route::prefix('admin')->as('admin.')->group(function(){
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});
// Route::get('/posts', function () {
//     // truy vấn
//     // Lấy tất cả
// //    $data = Post::all();
//     // c2
//     $data = Post::query()->get();
//     // where
//     $data = Post::query()
//         ->where('id', '>=', 1)
//         ->get();
//     // Them
//     // C1
// //        $post = new Post();
// //        $post->title = "BV 2";
// //        $post->content = "ND BV so 2";
// //        $post->save();
// //        C2
// //    $post = Post::query()->create([
// //        'title' => "BV so 3",
// //        'content' => "ND BV so 3",
// //        'name' => "Nguyen Van A"
// //    ]);
//     // Sua
//     // C1
// //    $post = Post::query()->find(1);
// //    $post->title = "BV 2";
// //    $post->save();
// //    C2
//     $post = Post::query()->find(1)
//         ->update([
//             'title' => "BV so 3",
//             'content' => "ND BV so 3"
//         ]);
//     // Xoa
// //  Cung
//     $post = Post::query()->find(1)->delete();
//     dd($data);
// //    return view('welcome');
// });
