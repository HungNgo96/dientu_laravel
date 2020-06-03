<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matensanpham;
class MatensanphamController extends Controller
{
    public function index(){
        $data = Matensanpham::all();
        return $data;
    }
}
