<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $view;
    public function __construct(){
        $this->view=[];    
    }
    public function index(){
        $objPro=new Product();
        $this->view['listPro']=$objPro->loadAllDataProductWithPager();
        return view('cate.index',$this->view);
    }
    public function create(){
        $objCate=new Category();
        $this->view['listCate']=$objCate->loadAllDataCategory();
        return view('cate.add',$this->view);
    }
    public function store(Request $request){
        $validate=$request->validate(
            [
                'name'=>['required','string','max:255'],
                'status'=>['required','integer'],
        ],
        [
            'name.required'=>'ko de trong',
            'name.string'=>'la string',
            'name.max'=>'duoi 255',
            'status.required'=>'ko de trong',
            'status.interger'=>'la string',
            'status.min'=>'lon hon 1',
                    ]
        );
        }
}