<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
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
//query builder
Route::get('/users', function () {
    // //truy vẫn đơn
    // //lấy ra tất cả bản ghi
    // $data = DB::table('users')->get();

    // //lấy ra 1 bản ghi theo id
    // $data = DB::table('users')->first();

    // //lấy ra bản ghi theo điều kiện 
    // $data = DB::table('users')->where('id', '=', 41)->first();

    // //like
    // $data = DB::table('users')->where('name', 'like', '%A%')->get();

    // //and
    // $data = DB::table('users')
    //     ->where('name', 'like', '%A%')
    //     ->where('id', '>', 5)
    //     ->toRawSql();
    // //c2
    // $data = DB::table('users')
    //     ->where([
    //         ['name', 'like', '%A%'],
    //         ['id', '>', 5],
    //     ])
    //     ->toRawSql();

    // //or
    // $data = DB::table('users')
    //     ->Where('name', 'like', '%A%')
    //     ->orWhere('id', '>', 5)
    //     ->toRawSql();

    // //not
    // $data = DB::table('users')
    //     ->select('name', 'id')
    //     ->whereNot('id', '>', 5)
    //     ->toRawSql();

    // //truy vấn lồng
    // //join
    // $data = DB::table('categories')
    //     ->join('products', 'categories.id', '=', 'products.category_id')
    //     ->toRawSql();

    // //left join
    // $data = DB::table('categories')
    //     ->leftJoin('products', 'categories.id', '=', 'products.category_id')
    //     ->toRawSql();
    // dd($data);

    // //right join
    // $data = DB::table('categories')
    //     ->rightJoin('products', 'categories.id', '=', 'products.category_id')
    //     ->toRawSql();
    // dd($data);

    return view('welcome');
});

Route::get('posts', function () {



    //thêm (c1)
    // Post::create([
    //     'title' => 'bài viết 2',
    //     'content' => 'content bài viết 2'
    // ]);

    //cách 2
    // $post = new Post();
    // $post->title = 'bài viết 3';
    // $post->content = 'content bài viết 3';
    // $post->save();

    //sửa
    // $post = Post::findOrFail(2);

    //cách 1:
    // $post->update([
    //     'title' => 'bài viết 1 updated',
    //     'content' => 'content bài viết 1 updated'
    // ]);

    //cách 2
    // $post->title = "title bài 2 update";
    // $post->content = "content bài 2 update";
    // $post->save();

    //xóa cứng

    // $post->delete();

    // $data = Post::all();
    // $data = Post::where('id', '>=', 1)->get();

    // abort(403);
    // dd($data);

})->name('posts');

Route::prefix('admin')->group(function () {

    Route::resource('products', ProductController::class);

});

