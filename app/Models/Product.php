<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
        'status',
        'created_at',
        'update_at'
    ];
    public function listCate(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function loadAllDataProductWithPager(){
        // ORM
        $query = Product::query()
            ->with('listCate')
            ->latest('id')
            ->paginate(10);
        return $query;

    }
    public function insertDataProduct($params){
        $params['status'] = 1;
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Product::query()->create($params);
        return $res;
    }
    public function loadIdDataProduct($id){
        $query = Product::query()->find($id);
        return $query;
    }
    public function deleteDataProduct($id){
        $query = Product::query()
            ->find($id)
            ->delete();
        return $query;
    }
}
