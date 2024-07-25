<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const PATH_VIEW = 'products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('category')->latest('id')->paginate(10);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate(
            [
                'name' => ['required', 'max:255', 'string', 'unique:products'],
                'price' => ['required', 'max:255', 'integer', 'min:1'],
                'quantity' => ['required', 'max:255', 'integer', 'min:1'],
                'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
                'category_id' => ['required', 'exists:categories,id'],
                'description' => ['required', 'max:255', 'string']
            ]
            ,[
                'name.required' => 'Trường tên không được bỏ trống',
                'name.string' => 'Trường tên phải là kiểu string',
                'name.max' => 'Trường tên không được :max kí tự',
                'name.unique' => 'Trường tên đã bị trùng',

                'price.required' => 'Trường price không được bỏ trống',
                'price.integer' => 'Trường price phải là kiểu integer',
                'price.max' => 'Trường price không được lớn hơn :max kí tự',
                'price.min' => 'Trường price không được nhỏ hơn :min kí tự',

                'quantity.required' => 'Trường quantity không được bỏ trống',
                'quantity.integer' => 'Trường quantity phải là kiểu integer',
                'quantity.max' => 'Trường quantity không được lớn hơn :max kí tự',
                'quantity.min' => 'Trường quantity không được nhỏ hơn :min kí tự',

                'image.required' => 'Trường image không được bỏ trống',
            ]
        );

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->image);
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->image);
        }

        $oldImage = $product->image;

        $product->update($data);

        if ($oldImage && $request->hasFile('image') && Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        }

        return redirect()->route('products.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        return back()->with('success', 'Xóa thành công');
    }

    public function search(Request $request)
    {

    }
}
