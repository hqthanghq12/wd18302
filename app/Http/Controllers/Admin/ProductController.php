<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProPage();
        return view('admin.product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllDataCate();
        return view('admin.product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'name' =>'required|string|max:255',
            'price'=>'required|interger|min:1',
            'quantity'=> 'required|interger|min:1',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'category_id'=>'required|exists:categories,id',
          ],
       [
          'name.required' => 'Không được bỏ trống',
          'name.string' => 'Sản phẩm phải là chuỗi',
          'name.max' => 'Tên không quá 255 từ',
          'price.required' => 'Không được bỏ trống',
          'price.interger' => 'Giá phải là số',
          'price.min' => 'Gía nhỏ nhất là 1',
          'quantity.required' => 'Không được bỏ trống',
          'quantity.interger' => 'Quantity phải là số',
          'quantity.min' => 'Quantity nhỏ nhất là 1',
          'image.required' => 'Không được bỏ trống',
          'image.image' => 'Phải là ảnh',
          'image.mines' => 'Image phải là file jpg png jpeg',
          'category_id.required' => 'Không được bỏ trống',
          'category_id.exists' => 'Danh mục không hợp lệ',
       ]);
       Category::create($validate);
       return redirect()->route('admin.product.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}