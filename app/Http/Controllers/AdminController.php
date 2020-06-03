<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Donhang;
use App\Hangsanxuat;
use App\Chitietdonhang;
use App\Chitietkhuyenmai;
use App\Soluongsanpham;
use App\Sanpham;
use Illuminate\Notifications\Notifiable;
use DB;
class AdminController extends Controller
{
    public function getDashboard()
    {
        return view('admin.dashboard');
    }
    public function getChathotro(){
        return view('admin.chathotro');
    }
    public function getKhuyenmai(){
        return view('admin.quanlykhuyenmai');
    }
    public function getThongke(){
        $user = User::where('level',1)->get()->count();
        $tongluotxemsanpham = Sanpham::select('luotxem')->sum('luotxem');
        $tongtien_donhang_trongngay = Donhang::where('trangthai',3)->whereDate('ngaydat',\Carbon\Carbon::now())->sum('tongtien');
        $tongtien_donhang_trongtuan =Donhang::where('trangthai',3)->whereBetween('ngaydat',[\Carbon\Carbon::now()->startOfWeek(),\Carbon\Carbon::now()->endOfWeek()])->sum('tongtien');
        $tongtien_donhang_trongthang = Donhang::where('trangthai',3)->whereMonth('ngaydat',\Carbon\Carbon::now()->month)->sum('tongtien');
        $tongtien_donhang_trongnam = Donhang::where('trangthai',3)->whereYear('ngaydat',\Carbon\Carbon::now()->year)->sum('tongtien');
        $chitietdonhang = Chitietdonhang::with('donhang','sanpham')->orderBy('id','DESC')->take(7)->get();
        $chitietkhuyenmai = Chitietkhuyenmai::with('sanpham','khuyenmai')->take(4)->get();
        $sanpham = Sanpham::with('cauhinhmaytinh','cauhinhdienthoai')->take(4)->orderBy('id','DESC')->get();
        $countsoluong = Soluongsanpham::all()->sum('tongsoluong');
        $countsoluongchitiet = Chitietdonhang::all()->sum('soluong');
        $tongdonhang = Donhang::all()->count();
       
        $tongdonhangthanhcong = Donhang::where('trangthai',3)->count();
        $tongdonhangchoduyet = Donhang::where('trangthai',0)->count();
        $tongdonhangdaduyet = Donhang::where('trangthai',1)->count();
        $tongdonhangdanggiao = Donhang::where('trangthai',2)->count();
        $tongdonhangdahuy = Donhang::where('trangthai',4)->count();
        $data =[
            "user"=>$user,
            "tongluotxemsanpham"=>$tongluotxemsanpham,
            "tongtien_donhang_trongngay"=>$tongtien_donhang_trongngay,
            "tongtien_donhang_trongtuan"=>$tongtien_donhang_trongtuan,
            "tongtien_donhang_trongthang"=>$tongtien_donhang_trongthang,
            "tongtien_donhang_trongnam"=>$tongtien_donhang_trongnam,
            "chitietdonhang"=>$chitietdonhang,
            "chitietkhuyenmai"=>$chitietkhuyenmai,
            "sanpham"=>$sanpham,
            "countsoluong"=>$countsoluong,
            "countsoluongchitiet"=>$countsoluongchitiet,
            "tongdonhang"=>$tongdonhang,
            "tongdonhangthanhcong"=>$tongdonhangthanhcong,
            "tongdonhangchoduyet"=>$tongdonhangchoduyet,
            "tongdonhangdaduyet"=>$tongdonhangdaduyet,
            "tongdonhangdanggiao"=>$tongdonhangdanggiao,
            "tongdonhangdahuy" =>$tongdonhangdahuy,
        ];
        return response()->json($data);
        
    }
    public function getThongbao($item)
    {
        $donhang = new Donhang();
        $user = User::findOrFail(1);
        foreach ($user->unreadNotifications as $value) {
            // dd($value);
            if ($value->id == $item) {
               
                // $donhang = $value->data->donhang;
                $value->markAsRead();
                
            }
        }
       
        
    }
    public function getThongbaodonhang(){
        return view('admin.thongbaochitietdonhang');
    }
    public function getThongbaodonhangid($id){
        $donhang = Donhang::with('chitietdonhang','user')->where('trangthai',0)->where('id',$id)->get();
        return view('admin.thongbaochitietdonhang',compact('donhang'));

    }
    public function getTatcathongbao(){
         
        $user = User::findOrFail(1);
        $user->unreadNotifications->markAsRead();
        $data = $user->notifications->sortByDesc('updated_at');
        // foreach($data as $item){
        //     echo "<pre>";
        //     echo $item->read_at;
        //     echo "</pre>";
        // }
     return view('admin.xemtatcathongbao',compact('data'));
     
    }
    public function deleteTatcathongbao(Request $request){
        
            $thongbao = DB::table('notifications')->delete();
        
            return response(['message'=>"Thất bại"]);
        
        
    }
}
