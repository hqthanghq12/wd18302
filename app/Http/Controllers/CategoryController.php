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
        $objPro = new Category();
        $this->view['listCate'] = $objPro->loadAllDataCategory();
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->view['category'] = Category::findOrFail($id);
        return view('category.edit', $this->view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
