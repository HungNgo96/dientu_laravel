<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hangsanxuat;

class HangsanxuatController extends Controller
{
    public function getDanhsachhangsanxuat()
    {
        return view("admin.hangsanxuat.hangsanxuat");
    }
    public function index()
    {
        return Hangsanxuat::all();
    }
    public function store(Request $request)
    {
        $hangsanxuat = new Hangsanxuat();
        if ($request->input('logoshow') && $request->input('logoshow')) {
        //    $image = $request->get('hinhanh');
            $name2 = $request->input('logo');
        //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->input('logoshow'))->save(public_path('image/logo/') . $name2);

        }
        $hangsanxuat->tenhangsanxuat = $request->input('tenhangsanxuat');
        $hangsanxuat->logo = $request->input('logo');
        $hangsanxuat->save();
        return response([
            'result' => 'success'
        ], 200);

    }
    public function destroy(Request $request,$id){
        $hangsanxuat = Hangsanxuat::withCount('sanpham')->findOrFail($id);
        if($hangsanxuat->sanpham_count > 0){
            return response([
                'result' => 'loi'
            ]);
        }else{
            $hangsanxuat->delete();
            return response()->json([ 'result' => 'success'],200);
        }
        
        
        
        
    }
    public function update(Request $request,$id){
        $hangsanxuat = Hangsanxuat::findOrFail($id);
        if ($request->input('logoshow') && $request->input('logoshow')!='') {
            //    $image = $request->get('hinhanh');
                $name2 = $request->input('logo');
            //    $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($request->input('logoshow'))->save(public_path('image/logo/') . $name2);
                $hangsanxuat->logo = $request->input('logo');
    
            }
            $hangsanxuat->tenhangsanxuat = $request->input('tenhangsanxuat');
           
            $hangsanxuat->save();
            return response([
                'result' => 'success'
            ], 200);
    }
}
