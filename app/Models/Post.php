<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = "posts";

    // protected $primaryKey = 'tên khóa chính khác';
    // protected $keyType = 'Kiểu dữ liệu khóa chính';
    // public $incrementing = false; tắt trạng thái tăng tự động cho primaryKey
    // protected $connection = 'tên db mới';
    protected $fillable = [
        'title',
        'content'
    ];
}
