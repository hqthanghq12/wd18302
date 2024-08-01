<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        'updated_at'
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
    
    public function updateDataProduct($params, $id){
        $params['updated_at'] = date('Y-m-d H:i:s');
        $res = Product::query()->find($id)->update($params);
        return $res;
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
    public function upadateDataProduct($params, $id){
        $params['updated_at'] = date('Y-m-d H:i:s');
        $res = Product::query()->find($id)->update($params);
        return $res;


    }
}
