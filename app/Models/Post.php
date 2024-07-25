<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Đổi key cho bảng
    // protected $primaryKey = "ten bang khoa chinh khac vs id";
    // protected $keyType = "kieu du lieu cua khoa chinh";
    // public $incrementing = false;//cách tắt trạng thái tăng tự động cho khóa chính

    // //Chuyển kết nối từ db này sang db khác
    // protected $connection = 'ten db moi';
    //Mac dinh ganq
    protected $fillable = [
        'title',
        'content'
    ];
}
