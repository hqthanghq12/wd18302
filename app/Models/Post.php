<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = "posts";
    //Đổi PK cho bảng
    // protected $primaryKey = "ma" ;//tên khóa chính
    // protected $keyType = "string";//kiểu dữ liệu của khóa chính
    // public $incrementing = false; //tắt trạng thái tăng tự động cho khóa chính 
    // protected $connection = "tên db";//thay đổi db

    ///mặc định gán
    protected $fillable = [
        'title',
        'content'
    ];
}

