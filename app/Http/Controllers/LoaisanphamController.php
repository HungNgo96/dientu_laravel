<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaisanpham;
class LoaisanphamController extends Controller
{
    public function index(){
        $data = Loaisanpham::all();
        return $data;
    }
}
