<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\Loaisanpham;
use App\Hangsanxuat;
use App\User;
use App\Donhang;
use Auth;
use App\Chitietdonhang;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Contracts\Mail\Mailable;

class GiaodienController extends Controller
{
    public function guiMaillienhe(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $url = $request->input('url');
        $noidung = $request->input('message');
        // dd($email);withSwiftMessage
        $data = array('name' => $name, 'email' => $email, 'noidung' => $noidung, 'url' => $url);
        Mail::send('mail.yeucaukhachhang', $data, function ($message) {
            $message->to('hirolap96@gmail.com', 'Hirolap')
                ->from('trongnhan2603961@gmail.com', 'Nhan')

                ->subject('Yêu cầu khách hàng!');
        });
        return redirect()->back()->with('status', 'Bạn đã gửi email thành công');
    }
    public function giohang()
    {
        return view('giaodien.giohang.giohang');
    }
    public function thanhtoan()
    {
        return view('giaodien.giohang.thanhtoan');
    }
    public function getDathangthanhcong()
    {
        return view('giaodien.giohang.dathangthanhcong');
    }
    public function notfound()
    {
        return view('404');
    }
    public function index()
    {
        return view('giaodien.index');
    }
    public function thongtin()
    {
        return view('giaodien.thongtin');
    }
    public function lienhe()
    {
        return view('giaodien.lienhe');
    }
    public function getSosanh()
    {
        return view('giaodien.sanpham.sosanh');
    }
    public function xoadata1(Request $request)
    {
        $request->session()->forget('data1');
        return redirect()->route('giaodien.sanpham.sosanh');
    }
    public function xoadata2(Request $request)
    {
        $request->session()->forget('data2');
        return redirect()->route('giaodien.sanpham.sosanh');
    }
    public function timkiem(Request $request)
    {
        $search1 = $request->input('tukhoa');
        if ($search1 != '') {
            $search = $search1;
            $sort = $request->get('sort');

        // if ($sort == 'desc') {
        //     $ketqua = Sanpham::with('mota', 'soluongsanpham','chitietkhuyenmai')->whereLike(['tensp','loaisanpham.tenloai','hangsanxuat.tenhangsanxuat','matensanpham.tenmasanpham'],$search)->orderBy('dongia', 'desc')->paginate(6);
            
        // } else if ($sort == 'asc') {
        //     $ketqua = Sanpham::with('mota', 'soluongsanpham','chitietkhuyenmai')->whereLike(['tensp','loaisanpham.tenloai','hangsanxuat.tenhangsanxuat','matensanpham.tenmasanpham'],$search)->orderBy('dongia', 'asc')->paginate(6);
           
        // } else if ($sort == 'name') {
        //     $ketqua = Sanpham::with('mota', 'soluongsanpham','chitietkhuyenmai')->whereLike(['tensp','loaisanpham.tenloai','hangsanxuat.tenhangsanxuat','matensanpham.tenmasanpham'],$search)->orderBy('tensp', 'asc')->paginate(6);
           
        // } else if ($sort == 'namedesc') {
        //     $ketqua = Sanpham::with('mota', 'soluongsanpham','chitietkhuyenmai')->whereLike(['tensp','loaisanpham.tenloai','hangsanxuat.tenhangsanxuat','matensanpham.tenmasanpham'],$search)->orderBy('tensp', 'desc')->paginate(6);
            
        // } else {
        //     
        // }
            $ketqua = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->whereLike(['tensp', 'loaisanpham.tenloai', 'hangsanxuat.tenhangsanxuat', 'matensanpham.tenmasanpham'], $search)->get();
            return view('giaodien.timkiem', compact('ketqua', 'search', 'sort'));
        // return response(['ketqua' => $data]);
        }else{
            return redirect()->back();
        }



    }
    public function sosanh($id, Request $request)
    {
        $data = Sanpham::findOrFail($id);
        if ($data->id_matensanpham == 1) {
            $sanpham = SanPham::with('mota', 'cauhinhmaytinh', 'cauhinhdienthoai', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->findOrFail($id);
        } else {
            $sanpham = Sanpham::with('mota', 'cauhinhdienthoai', 'cauhinhmaytinh', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->findOrFail($id);
        }
        if ($request->session()->has('data1')) {
            $request->session()->put('data2', $sanpham);
        } else {
            $request->session()->put('data1', $sanpham);
        }
        // var_dump(session('data1')->id_matensanpham);
        return redirect()->route('giaodien.sanpham.sosanh');
    }
    public function getSanphamBanner()
    {
        $sanpham = Sanpham::with('soluongsanpham', 'mota', 'chitietkhuyenmai', 'chitietdonhang')->where('dongia', '>', 0)->orderBy('ngaytao', 'desc')->take(4)->get()->toArray();
        $sanphamtop = Sanpham::withCount('soluongsanpham', 'mota', 'chitietkhuyenmai', 'chitietdonhang')->where('dongia', '>', 0)->with('soluongsanpham', 'mota', 'chitietkhuyenmai', 'chitietdonhang')->orderBy('chitietdonhang_count', 'desc')->take(6)->get()->toArray();
        $data = [
            'sanpham' => array_chunk($sanpham, 1),
            'sanphamtop' => array_chunk($sanphamtop, 2),
        ];
        return response()->json($data);
    }
    public function getHangsanxuat(Request $request, $id)
    {
        $sort = $request->get('sort');
        $loaihsx = Hangsanxuat::findOrFail($id);

        if ($sort == 'desc') {
            $sanphamhsx = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_hangsanxuat', $id)->where('dongia', '>', 0)->where('dongia', '>', 0)->orderBy('dongia', 'desc')->paginate(6);
        } else if ($sort == 'asc') {
            $sanphamhsx = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_hangsanxuat', $id)->where('dongia', '>', 0)->where('dongia', '>', 0)->orderBy('dongia', 'asc')->paginate(6);
        } else if ($sort == 'name') {
            $sanphamhsx = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_hangsanxuat', $id)->where('dongia', '>', 0)->where('dongia', '>', 0)->orderBy('tensp', 'asc')->paginate(6);
        } else if ($sort == 'namedesc') {
            $sanphamhsx = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_hangsanxuat', $id)->where('dongia', '>', 0)->where('dongia', '>', 0)->orderBy('tensp', 'desc')->paginate(6);
        } else {

            $sanphamhsx = Sanpham::with('mota', 'soluongsanpham', 'hangsanxuat', 'chitietkhuyenmai')->where('dongia', '>', 0)->where('id_hangsanxuat', $id)->paginate(6);
        }
        return view('giaodien.sanpham.danhsachhangsx', compact('loaihsx', 'sort', 'sanphamhsx'));
    }
    public function getLoaisanpham(Request $request, $id)
    {
        $sort = $request->get('sort');
        $loaisanpham = Loaisanpham::findOrFail($id);

        if ($sort == 'desc') {
            $sanphamloai = Sanpham::with('mota', 'soluongsanpham', 'loaisanpham', 'chitietkhuyenmai')->where('id_loaisanpham', $id)->where('dongia', '>', 0)->orderBy('dongia', 'desc')->paginate(6);
        } else if ($sort == 'asc') {
            $sanphamloai = Sanpham::with('mota', 'soluongsanpham', 'loaisanpham', 'chitietkhuyenmai')->where('id_loaisanpham', $id)->where('dongia', '>', 0)->orderBy('dongia', 'asc')->paginate(6);
        } else if ($sort == 'name') {
            $sanphamloai = Sanpham::with('mota', 'soluongsanpham', 'loaisanpham', 'chitietkhuyenmai')->where('id_loaisanpham', $id)->where('dongia', '>', 0)->orderBy('tensp', 'asc')->paginate(6);
        } else if ($sort == 'namedesc') {
            $sanphamloai = Sanpham::with('mota', 'soluongsanpham', 'loaisanpham', 'chitietkhuyenmai')->where('id_loaisanpham', $id)->where('dongia', '>', 0)->orderBy('tensp', 'desc')->paginate(6);
        } else {

            $sanphamloai = Sanpham::with('mota', 'soluongsanpham', 'loaisanpham', 'chitietkhuyenmai')->where('id_loaisanpham', $id)->where('dongia', '>', 0)->paginate(8);
        }
        return view('giaodien.sanpham.danhsachloaisanpham', compact('sanphamloai', 'sort', 'loaisanpham'));
    }

    public function getDanhsachdienthoai(Request $request)
    {
        $sort = $request->get('sort');
        if ($sort == 'desc') {
            $dienthoai = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 2)->where('dongia', '>', 0)->orderBy('dongia', 'desc')->paginate(6);
        } else if ($sort == 'asc') {
            $dienthoai = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 2)->where('dongia', '>', 0)->orderBy('dongia', 'asc')->paginate(6);
        } else if ($sort == 'name') {
            $dienthoai = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 2)->where('dongia', '>', 0)->orderBy('tensp', 'asc')->paginate(6);
        } else if ($sort == 'namedesc') {
            $dienthoai = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 2)->where('dongia', '>', 0)->orderBy('tensp', 'desc')->paginate(6);
        } else {
            $dienthoai = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 2)->where('dongia', '>', 0)->paginate(8);
        }
        return view('giaodien.sanpham.danhsachdienthoai', compact('dienthoai', 'sort'));
    }
    public function getDanhsachmaytinh(Request $request)
    {
        $sort = $request->get('sort');
        if ($sort == 'desc') {
            $maytinh = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 1)->where('dongia', '>', 0)->orderBy('dongia', 'desc')->paginate(6);
        } else if ($sort == 'asc') {
            $maytinh = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 1)->where('dongia', '>', 0)->orderBy('dongia', 'asc')->paginate(6);
        } else if ($sort == 'name') {
            $maytinh = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 1)->where('dongia', '>', 0)->orderBy('tensp', 'asc')->paginate(6);
        } else if ($sort == 'namedesc') {
            $maytinh = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 1)->where('dongia', '>', 0)->orderBy('tensp', 'desc')->paginate(6);
        } else {
            $maytinh = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('id_matensanpham', 1)->where('dongia', '>', 0)->paginate(6);
        }

        return view('giaodien.sanpham.danhsachmaytinh', compact('maytinh', 'sort'));
    }
    public function getSanpham(Request $request)
    {
        $sort = $request->get('sort');
        if ($sort == 'desc') {
            $sanpham = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->orderBy('dongia', 'desc')->paginate(6);
        } else if ($sort == 'asc') {
            $sanpham = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->orderBy('dongia', 'asc')->paginate(6);
        } else if ($sort == 'name') {
            $sanpham = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->orderBy('tensp', 'asc')->paginate(6);
        } else if ($sort == 'namedesc') {
            $sanpham = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->orderBy('tensp', 'desc')->paginate(6);
        } else {
            $sanpham = Sanpham::with('mota', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->paginate(6);
        }
        return view('giaodien.sanpham.sanpham', compact('sanpham', 'sort'));
    }
    public function chitietsanpham($id, Request $request)
    {
        $chitietsanpham = Sanpham::with('mota', 'cauhinhdienthoai', 'cauhinhmaytinh', 'soluongsanpham', 'chitietkhuyenmai')->findOrFail($id);
        $key = 'a' . $chitietsanpham->id;
        if (!($request->session()->has($key))) {
            $chitietsanpham->increment('luotxem', 1);
            $request->session()->put($key, 1);
        }
        $sanphamlienquan = Sanpham::with('mota', 'cauhinhdienthoai', 'cauhinhmaytinh', 'soluongsanpham', 'chitietkhuyenmai')->where('dongia', '>', 0)->where('id_loaisanpham', $chitietsanpham->id_loaisanpham)->get();
        return view('giaodien.sanpham.chitietsanpham', compact('chitietsanpham', 'sanphamlienquan'));
    }
    public function postCapnhatthongnguoidung(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $pass = $request->password;
        $this->validate($request, [
            'name' => 'required|unique:users,name,' . $user->id,
            'diachi' => 'required',
            // 'sdt' => 'required|max:10',
            'gioitinh' => 'required',
        ], [
            // 'sdt.max'=>'Số điện thoại chỉ 10 số'
        ]);
        if (Hash::check($pass, $user->password)) {
            $user->name = $request->name;
            $user->diachi = $request->diachi;
            $user->sdt = $request->sdt;
            $user->gioitinh = $request->gioitinh;
            $user->save();
            return response(['message' => 'Thành công']);
        } else {
            return response(['message' => 'Mật khẩu không đúng']);
        }
    }
    public function postDoimatkhau(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $matkhau = $request->matkhau;
        $this->validate($request, [
            'matkhaumoi' => 'min:6|max:20'
        ], [
            'matkhaumoi.min' => 'Mật khẩu tối thiếu 6',
            'matkhaumoi.max' => 'Mật khẩu tối đa 20',
        ]);
        if (Hash::check($matkhau, $user->password)) {
            if ($request->matkhaumoi == $request->xacnhanmatkhaumoi) {
                $user->password = Hash::make($request->matkhaumoi);
                $user->save();
                return response(['message' => 'Thành công']);
            } else {
                return response(['message' => 'Xác nhận lại mật khẩu mới không đúng']);
            }
        } else {
            return response(['message' => 'Mật khẩu hiện tại không đúng']);
        }

    }
    public function postHuydonhang(Request $reuqest, $id)
    {
        $user = Auth::user();
        $donhang = Donhang::findOrFail($id);
        if ($donhang) {
            $donhang->trangthai = 4;
            // $donhang->tongtien = 0;
            $donhang->save();
            // $chitietdonhang = Chitietdonhang::where('id_donhang',$id)->get();
            // foreach($chitietdonhang as $item){
            //     $item->delete();
            // }
            return response(['message' => 'Thành công']);
        }
        return response(['message' => 'Thất bại']);

    }
    public function getChoduyetnguoidung()
    {
        $user = Auth::user();
        if ($user) {
            $donhang = Donhang::withCount('chitietdonhang')->with('chitietdonhang', 'user')->where('id_user', $user->id)->where('trangthai', 0)->get();
            return $donhang;
        } else {
            return response(['message' => "Thất bại"]);
        }


    }
    public function getHuydonhangnguoidung()
    {
        $user = Auth::user();
        if ($user) {
            $donhang = Donhang::withCount('chitietdonhang')->with('chitietdonhang', 'user')->where('id_user', $user->id)->where('trangthai', 4)->get();
            return $donhang;
        } else {
            return response(['message' => "Thất bại"]);
        }
    }

}
