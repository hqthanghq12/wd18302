<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    protected $view =[];
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $objCate = new Category();
        $this->view['listCate']= $objCate->loadAllDataCategory();
        // dd($this->view['listPro']);
        return view('category.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', $this->view);
        
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
            ],
            [
                'name.required'=>'Tên không được bỏ trống',
                'name.string'=>'Tên phải là kiểu ký tự',
                'name.max'=>'Tên không được quá 255 ký tự',
            ]
        );
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
