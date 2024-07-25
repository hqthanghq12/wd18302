<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // $objPro = new Category();
        // $this->view['listcate'] = $objPro->loadAllDataCategory();
        // dd($this->view['listPro']);
        $cate = Category::query()->paginate(10);
        return view('category.index',compact('cate'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max' => 255],
               
            ],
            [
                'name.required' => 'Trường tên không được bỏ trống',
                'name.string' => 'Trường tên yêu cầu bắt buộc là kiểu dữ liệu ký tự',
                'name.max' => 'Trường tên không được vượt quá 255 ký tự',
               
            ]);
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
