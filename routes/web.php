<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// Route::get('/products', [ProductController::class,'index'])->name('products.index');
// Route::get('/products/add', [ProductController::class,'create'])->name('products.create');
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
//Query build 
// Route::get('/category', function () {
//     // Truy vấn đơn
//     // Lấy ra tất cả bản ghi = với câu lệnh select * from
//     $data = DB::table('san_phams')->get();
//     //Lấy ra 1 bản ghi
//     $data = DB::table('san_phams')->first(); // hàm first có trả về 
//     // Where 
//     $data = DB::table('san_phams')
//     ->where('id','=', 5)->first();
//     //Like 
//     $data = DB::table('san_phams')->where('name', 'like', '%A%')->toRawSql();
//     // AND
//     // c1
//     $data = DB::table('san_phams')
//     ->where('name', 'like', '%A%')
//     ->where('id', '>=', 5)
//     ->toRawSql();
//     // c2
//     $data = DB::table('san_phams')
//     ->where([
//         ['name', 'like', '%A%'],
//         ['id', '>=', 5]
//     ])
//     ->toRawSql();
//     // OR (Hoặc)
//     $data = DB::table('san_phams')
//     ->Where('name', 'like', '%A%')
//     ->orWhere('id', '>=', 5)
//     ->toRawSql();
//     // NOT
//     $data = DB::table('san_phams')
//     // ->Where('name', 'like', '%A%')
//     ->whereNot('id', '>=', 5)
//     ->toRawSql();
//     // ...
//     // whereBetween, whereNotBetween
//     // whereDate, whereMonth,...
//     // Truy vấn lồng
//     $data = DB::table('san_phams')
//     ->join('products', 'san_phams.id', '=', 'products.category_id')
//     ->toRawSql();
//     // left join
//     $data = DB::table('san_phams')
//     ->leftJoin('products', 'san_phams.id', '=', 'products.category_id')
//     ->toRawSql();
//     dd($data);
//     return view('welcome');
// });