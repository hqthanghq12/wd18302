<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    const PATH_VIEW = 'category.';
    private $model;
    public function __construct(Category $model) {
        $this->model = $model;
    }

    public function index() {
        $data = $this->model->query()->with(['products'])->latest('id')->paginate($this->model->getPerPage());
        return view(self::PATH_VIEW . __FUNCTION__, [
            'data' => $data,
        ]);
    }

    public function create() {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $this->model->create($request->all());
        return redirect('/categories');
    }
}
