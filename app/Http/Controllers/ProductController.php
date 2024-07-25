<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:300','unique:products,name'],
            'price' => ['required','numeric'],
            'quantity' => ['required','integer'],
            'description' => ['required'],
            'image' => ['required','image'],
            'category_id'=>['required','integer'],
            'status'=>['required','integer'],
        ],[
            'name.required' => 'Name ko được để trống',
            'name.max'=> 'Name không quá 300 chữ',
            'name.unique'=>'Name này đã tồn tại',
            'price.required' => 'Price ko được để trống',
            'price.numeric'=> 'Price phải là số',
            'quantity.required' => 'Quantity ko được để trống',
            'quantity.integer'=>'Quantity phải là số nguyên',
            'description.required' => 'Description ko được để trống',
            'image.required' => 'Image ko được để trống',
            'image.image'=>'Image phải là hình ảnh',
            'category_id.required' => 'Category ko được để trống',
            'category_id.integer'=>'Category phải là số nguyên',
            'status.required' => 'Status ko được để trống',
            'status.integer'=>'Status phải là số nguyên',
            

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->back();
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
