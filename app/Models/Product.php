<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable=[
        'id',
        'name',
        'quantity',
        'image',
        'status',
        'category_id',
        'price',
        'created_at',
        'updated_at'
    ];
    public function listCate(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function loadAllDataProductWithPager(){
        //orm
        $query=Product::query()->with('listCate')->latest('id')->paginate(10);
        return $query;
    }
}
