<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
        'status',
    ];
    public function listCatagory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function loadAllDataProPage(){
        // ORM
        $query = Product::query()
        ->with('listCatagory')
        ->latest('id')
        ->paginate(10);
        return $query;
    }
}
