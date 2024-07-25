<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];
    protected $hidden = [
        'title'
    ];

    // đổi primary key mặc định từ id sang sku
    protected $primaryKey = 'sku';
    protected $keyType = 'string';
    public $incrementing = false;
    // protected $connection = 'mysql';

}
