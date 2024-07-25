<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $view;
    public function __construct(){
        $this->view=[];    
    }
    public function index(){
        $objPro=new Category();
        $this->view['listCate']=$objPro->loadAllDataCategory();
        return view('Cate.index',$this->view);
    }
    public function create(){
        return view('Cate.add',$this->view);
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
