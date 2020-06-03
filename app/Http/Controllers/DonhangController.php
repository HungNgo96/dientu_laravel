<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use App\Sanpham;
use App\Chitietdonhang;
use App\Nhanviengiaohang;
use App\Giaohang;
use Carbon\Carbon;
use App\Soluongsanpham;
use App\Trahang;
use Illuminate\Notifications\Notifiable;
use App\Sanphamloi;

class DonhangController extends Controller
{
    public function getDanhsachchoduyet()
    {
        return view('admin.donhang.choduyet');
    }
    public function getDanhsachdaduyet()
    {
        return view('admin.donhang.daduyet');
    }
    public function getDanhsachdanggiao()
    {
        return view('admin.donhang.danggiao');
    }
    public function getDanhsachhoanthanh()
    {
        return view('admin.donhang.dahoanthanh');
    }
    public function getDanhsachdahuy()
    {
        return view('admin.donhang.dahuy');
    }
    public function getDanhsachdoitra()
    {
        return view('admin.donhang.doitra');
    }
    public function getDanhsachsanphamloi()
    {
        return view('admin.donhang.sanphamloi');
    }
    public function traHangDangGiao($id,Request $request)
    {
        $this->validate($request,[
            "noidung"=>"required",
        ],[
            "noidung.required"=>"Chưa chọn nội dung",
        ]);
        $donhang = Donhang::with('chitietdonhang')->where('id', $id)->get();
        $giaohang = Giaohang::where('id_donhang',$id)->first();
        $giaohang->trangthai = 0;
        $giaohang->save();

        if ($request->input('noidung')) {
            if (trim($request->input('noidung')) == trim('Sản phẩm bị lỗi')) {
                // $donhang->trangthai = 4;
                // $donhang->save();
                foreach ($donhang as $item) {
                    $item->trangthai=4;
                    $item->save();
                    foreach ($item->chitietdonhang as $value) {
                        $sanpham = Sanpham::findOrFail($value->id_sanpham);
                        $trahang = new Trahang();
                        $trahang->id_user = $item->user->id;
                        $trahang->id_sanpham = $value->id_sanpham;
                        $trahang->id_donhang = $item->id;
                        $trahang->noidung = $request->input('noidung');
                        $trahang->soluong = $value->soluong;
                        $trahang->tinhtrang = "Sản phẩm lỗi";
                        $trahang->ngaytra = Carbon::now()->format('Y-m-d H:i:s');
                        $trahang->save();

                        $sanphamloi = new Sanphamloi();
                        $sanphamloi->id_sanpham = $value->id_sanpham;
                        $sanphamloi->tensp = $sanpham->tensp;
                        $sanphamloi->tinhtrang = "Sản phẩm lỗi";
                        $sanphamloi->ngayloi = Carbon::now()->format('Y-m-d H:i:s');
                        $sanphamloi->save();


                    }
                }
                return response(['message'=>"Sản phẩm lỗi"]);
            } else {
                foreach ($donhang as $item) {
                    $item->trangthai=4;
                    $item->save();
                    
                    foreach ($item->chitietdonhang as $value) {
                        $sanpham = Sanpham::findOrFail($value->id_sanpham);
                        $trahang = new Trahang();
                        $trahang->id_user = $item->user->id;
                        $trahang->id_sanpham = $value->id_sanpham;
                        $trahang->id_donhang = $item->id;
                        $trahang->noidung = $request->input('noidung');
                        $trahang->soluong = $value->soluong;
                        $trahang->tinhtrang = "Bình thường";
                        $trahang->ngaytra = Carbon::now()->format('Y-m-d H:i:s');
                        $trahang->save();

                    }
                }
                return response(['message'=>"BT"]);
            }

        }
    }
    public function getDanhsachdoitrasanpham()
    {
        $trahang = Trahang::with('sanpham', 'user', 'donhang')->get();
        return $trahang;
    }
    public function inPhieugiao($id)
    {
        $donhang = Donhang::with('user')->where('id', $id)->first();
        $chitietdonhang = Chitietdonhang::with('sanpham')->where('id_donhang', $id)->get();
        $giaohang = Giaohang::with('nhanviengiaohang')->where('id_donhang', $id)->first();


        return view('admin.phieugiao.phieugiao', compact('donhang', 'chitietdonhang', 'giaohang'));
    }
    public function getPhieugiao()
    {
        return view('admin.phieugiao.phieugiao');
    }
    public function inHoadon($id)
    {
        $donhang = Donhang::with('user')->where('id', $id)->first();
        $chitietdonhang = Chitietdonhang::with('sanpham')->where('id_donhang', $id)->get();
        $giaohang = Giaohang::with('nhanviengiaohang')->where('id_donhang', $id)->first();


        return view('admin.phieugiao.hoadon', compact('donhang', 'chitietdonhang', 'giaohang'));
    }
    public function getHoadon()
    {
        return view('admin.phieugiao.hoadon');
    }
    public function index()
    {
        $sanpham = Sanpham::all();
        $nhanviengiaohang = Nhanviengiaohang::with('giaohang')->get();
        $choduyet = Donhang::with('user', 'chitietdonhang')->where('trangthai', 0)->get();
        $daduyet = Donhang::with('user', 'chitietdonhang')->where('trangthai', 1)->where('tongtien', '>', 0)->get();
        $danggiao = Donhang::with('user', 'chitietdonhang', 'giaohang')->where('trangthai', 2)->get();
        $hoanthanh = Donhang::with('user', 'chitietdonhang')->where('trangthai', 3)->get();
        $dahuy = Donhang::with('user', 'chitietdonhang')->where('trangthai', 4)->get();
        $doitra = Donhang::with('user', 'chitietdonhang')->where('trangthai', 5)->get();
        $soluongsanpham = Soluongsanpham::all();
        $response = [
            'nhanviengiaohang' => $nhanviengiaohang,
            'sanpham' => $sanpham,
            'choduyet' => $choduyet,
            'daduyet' => $daduyet,
            'danggiao' => $danggiao,
            'hoanthanh' => $hoanthanh,
            'dahuy' => $dahuy,
            'doitra' => $doitra,
            'soluongsanpham' => $soluongsanpham,
        ];
        return $response;
    }
    public function update(Request $request, $id)
    {
        $donhang = Donhang::findOrFail($id);
        $donhang->trangthai = $request->input('trangthai');
        $donhang->save();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function updateXoa(Request $request, $id){
        $donhang = Donhang::findOrFail($id);
        $donhang->trangthai = $request->input('trangthai');
        $donhang->save();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function updateDaduyet(Request $request, $id)
    {
        $donhang = Donhang::findOrFail($id);
        $countdonhang = $donhang->chitietdonhang()->get()->count();
        $donhang->trangthai = $request->input('trangthai');
        $donhang->save();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function updateDanggiao(Request $request, $id)
    {
        $donhang = Donhang::findOrFail($id);
        $giaohang = Giaohang::where('id_donhang',$id)->first();
        $giaohang->trangthai=0;
        $giaohang->save();
        
        $donhang->trangthai = $request->input('trangthai');
        $id_donhang = $request->input('id_donhang');
        $datadonhang = Donhang::findOrFail($id_donhang)->chitietdonhang()->get();
        foreach ($datadonhang as $item) {
            $soluongsanpham = Soluongsanpham::where('id_sanpham', $item->id_sanpham)->first();
            $soluongsanpham->soluongcon = $soluongsanpham->soluongcon - $item->soluong;
            $soluongsanpham->save();
        }
        $donhang->save();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function updateChitietdonhang(Request $request, $id)
    {
        $chitietdonhang = Chitietdonhang::findOrFail($id);
        $donhang = Donhang::findOrFail($chitietdonhang->id_donhang);
        $soluong = $request->input('soluong');
        $soluongcu = $chitietdonhang->soluong;//1
        $chitietdonhang->soluong = $soluong;//3
        $chitietdonhang->save();
        $donhang->tongtien = ($donhang->tongtien) + ((($chitietdonhang->soluong) - $soluongcu) * $chitietdonhang->dongia);
        $donhang->save();
        if ($donhang->tongtien == 0) {
            $donhang->trangthai = 4;
            $donhang->save();
        }
        
        // if ($chitietdonhang->soluong == 0) {
        //     $chitietdonhang->delete();
        // }
        return response(['result' => 'success']);
    }
    public function deleteChitietdonhang($id)
    {

        $chitietdonhang = Chitietdonhang::findOrFail($id);
        $donhang = Donhang::findOrFail($chitietdonhang->id_donhang);
        if ($donhang->tongtien == 0) {
            $donhang->trangthai == 4;
            $donhang->save();
        }
        $chitietdonhang->delete();
        return response([
            'result' => 'success'
        ], 200);
    }
    public function chonNhanvien(Request $request)
    {
        $this->validate($request,[
            'nhanvien'=>"required",
            "songaygiao"=>"required",
        ],[
            "songaygiao.required"=>"Chưa chọn ngày giao",
            "nhanvien.required" =>"Chưa chọn nhân viên giao",
        ]);
        $giaohang = new Giaohang();
        $songaygiao = $request->input('songaygiao');
        //giaohang
        $giaohang->id_donhang = $request->input('donhang');
        $giaohang->id_nhanvien = $request->input('nhanvien');
        $giaohang->ngaygiao = Carbon::now()->addDay($songaygiao);
        $giaohang->trangthai = 1;
        $giaohang->save();
        //donhang
        $donhang = Donhang::findOrFail($request->input('donhang'));
        $donhang->trangthai = 2;
        $donhang->save();
        return response(['result' => 'success']);
    }


}
