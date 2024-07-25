<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $view = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->view['categories'] = Category::all();
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
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('message', 'Create category success');
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
