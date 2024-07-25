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
        $objCate = new Category();

        $this->view['listCate'] = $objCate->loadAllDataCategoryWithPager();
        return view('category.index', $this->view);
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
                'name' => ['required','unique:categories' ,'string', 'max:255'],
                'status' => ['required', 'in:0,1'],
            ],
            [
                'name.required' => 'Trường tên không được bỏ trống',
                'name.string' => 'Trường tên yêu cầu bắt buộc là kiểu dữ liệu ký tự',
                'name.unique' => 'Tên danh mục đã tồn tại',
                'name.max' => 'Trường tên không được vượt quá 255 ký tự',
                'status.required' => 'Phải chọn trạng thái',
                'status.in' => 'Trạng thái không hợp lệ',
            ]
        );
        // dd($request->all());
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
