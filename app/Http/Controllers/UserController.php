<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getDanhsachkhachhang(){
        return view('admin.nhanvienkhachhang.khachhang');
    }
    public function index(){
        return User::where('level',1)->get();
    }
    
}
