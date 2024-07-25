<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'categories.id',
        'categories.name',
        'categories.status',
        'categories.created_at',
        'categories.update_at'
    ];

    public function loadAllDataCategory(){
        $query = Category::query()->get();
        return $query;
    }
}
