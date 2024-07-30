<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(){
        return view('user.register');
    }
    public function postRegister(Request $request){
//        dd($request);
        // tự viết validate
//        dd($request->all());
        $request->merge(['password'=> Hash::make($request->password)]);
//        dd($request->all());
        $objUser = new User();
        $res = $objUser->insertDataUser($request->all());
        if($res){
            return redirect()->back()->with('success', 'Tài khoản thêm mới thành công!');
        }else{
            return redirect()->back()->with('error', 'Tài khoản thêm mới không thành công!');
        }
    }
}
