<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $model;

    const PATH_VIEW = 'product.';

    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function index() {
        $data = $this->model->query()->with(['Category'])->latest('id')->paginate($this->model->getPerPage());
        return view(self::PATH_VIEW . __FUNCTION__, [
            'data' => $data,
        ]);
    }

    public function create() {
        return view(self::PATH_VIEW . __FUNCTION__, [
            'categories' => Category::all(),
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|integer',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        $this->model->create($request->all());
        return redirect('/products');
    }
}
