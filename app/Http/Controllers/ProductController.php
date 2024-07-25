<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $view;
    
    public function __construct() {
      $this->view = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProductWithPager();
        // dd($this->view['listPro']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate']= $objCate->loadAllDataCategory();
        //dd($this->view['listCate']);
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $validate = $request->validate(
            [
                'name'=>['required','string','max:255',],
                'price'=>['required','integer','min:1'],
                'quantity'=>['required','integer','min:1'],
                'image'=>['required','image','mimes:jpg, png,jpeg','max:2048'],
                'category_id'=>['required','exists:categories,id']
            ],
            [
                'name.required'=>'Tên không được bỏ trống',
                'name.string'=>'Tên phải là kiểu ký tự',
                'name.max'=>'Tên không được quá 255 ký tự',
                //lab5
                
            ]
        );
        //dd($request->all());
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
