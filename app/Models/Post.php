<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Đổi Pkey cho bảng
    // protected $primaryKey = 'Sku';
    // Đổi tên bảng
    // protected $table = 'posts';
    // protected $keyType = 'string';
    // public $incrementing = false;

}
