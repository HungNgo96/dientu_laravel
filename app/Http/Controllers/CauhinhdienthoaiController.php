<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cauhinhdienthoai;
class CauhinhdienthoaiController extends Controller
{
    public function index(){
    $data1 = Cauhinhdienthoai::all();
    return $data1;
    }
}
