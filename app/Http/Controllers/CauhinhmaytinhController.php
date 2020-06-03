<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cauhinhmaytinh;
class CauhinhmaytinhController extends Controller
{
    public function index(){
        $data1 = Cauhinhmaytinh::all();
        return $data1;
    }
    public function store(Request $request ){
        $this->validate($request, [

        ],[

        ]);
        Cauhinhmaytinh::create([
            'id_sanpham' => $request->input('sanpham'),
            'manhinh'=> $request->input('manhinh'),
            'hdh'=> $request->input('hdh'),
            'cpu'=> $request->input('cpu'),
            'ram'=> $request->input('ram'),
            'vga'=> $request->input('vga'),
            'congketnoi'=>$request->input('congketnoi'),
            'bonho'=>$request->input('bonho'),
            'pin'=>$request->input('pin'),
            'thongtinkhac'=>$request->input('thongtinkhac')

        ]);
        return response([
            'result' => 'success'
        ], 200);
    }
}
