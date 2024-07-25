<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $view = [];
    public function index(){
        $this->view['products'] = Product::all();
        return view('product.index', $this->view);
    }
    public function create(){
        $cateModel = new Category();
        $this->view['categories'] = $cateModel->getAll();
        return view('product.create', $this->view);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image',
        ],[
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be a number',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category not exists',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be a image',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput($request->all())->with('messageBack', 'Create product fail');
        }


        return redirect()->route('product.index')->with('message', 'Create product success');
    }
}
