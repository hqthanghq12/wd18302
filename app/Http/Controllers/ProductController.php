<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $view;
    public function __construct(){
        $this->view=[];    
    }
    public function index(){
        $objPro=new Product();
        $this->view['listPro']=$objPro->loadAllDataProductWithPager();
        return view('products.index',$this->view);
    }
    public function create(){
        $objCate=new Category();
        $this->view['listCate']=$objCate->loadAllDataCategory();
        return view('products.add',$this->view);
    }    
    public function store(Request $request){
        $validate=$request->validate(
            [
                'name'=>['required','string','max:255'],
                'price'=>['required','integer','min:1'],
                'quantity'=>['required','integer','min:1'],
                'image'=>['required','image','mimes:jqg,png'],
                'category_id'=>['required'],
        ],
        [
            'name.required'=>'ko de trong',
            'name.string'=>'la string',
            'name.max'=>'duoi 255',
            'price.required'=>'ko de trong',
            'price.interger'=>'la string',
            'price.min'=>'lon hon 1',
            'quantity.required'=>'ko de trong',
            'quantity.interger'=>'la string',
            'quantity.min'=>'lon hon 1',
            'image.required'=>'ko de trong',
            'image.image'=>'la anh',
            'image.mimes'=>'sai dinh dang',
            'category_id.required'=>'ko de trong',
        ]
        );
        }
}
