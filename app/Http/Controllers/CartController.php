<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Donhang;
use App\Chitietdonhang;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\XacNhanDonHang;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ThongBaoDatHang;
use Illuminate\Notifications\Notifiable;
use GuzzleHttp\Client;

class CartController extends Controller
{
    public function getCart()
    {
        return view('index');
    }
    public function postThanhtoan(Request $request)
    {
        $this->validate($request, [
            'captcha' => 'required',
            'diachikhac' => 'required',
            'sdt' => 'required|numeric',
        ], [
            'captcha.required' => 'Bạn chưa tích vào bản kiểm tra robot',
            'diachikhac.required' => 'Không để rỗng địa chỉ',
            'sdt.required' => "Bạn chưa nhập SDT",
            'sdt.numeric'=>'SDT phải dạng số'

        ]);
        $captcha = $request->input('captcha');


        $useradmin = User::findOrFail(1);
        $donhang = new Donhang();
        $sdt = $request->input('sdt');
        $diachikhac = $request->input('diachikhac');
        $user = $request->input('user');
        $giohang = $request->input('giohang');
        $tongtien = $request->input('tongtien');
        //khach hang
        $khachang = User::findOrFail($user['id']);
        $khachang->sdt=$sdt;
        $khachang->save();
        //khach hang
        $donhang->id_user = $user['id'];
        $donhang->tongtien = $tongtien;
        $donhang->trangthai = 0;
        $donhang->ngaydat = Carbon::now();
        $donhang->diachi = $diachikhac;
        $donhang->save();
            // $donhang->id_user = $user['id'];
            // $donhang->tongtien = $tongtien;
            // $donhang->trangthai = 0;
            // $donhang->ngaydat = Carbon::now();
            // $donhang->diachi =
            // $donhang->save();
        $count = count($giohang);
        $count1 = count($giohang);
        if ($count > 0) {
            foreach ($giohang as $item) {
                // var_dump(count($item['chitietkhuyenmai']));
                if (count($item['chitietkhuyenmai']) > 0 && $item['chitietkhuyenmai']['0']['trangthai'] == 0) {

                    $chitietdonhang = new Chitietdonhang();
                    $chitietdonhang->id_donhang = $donhang->id;
                    $chitietdonhang->id_sanpham = $item['id'];
                    $chitietdonhang->soluong = $item['qty'];
                    $chitietdonhang->dongia = $item['chitietkhuyenmai']['0']['dongia_giamgia'];
                    $chitietdonhang->save();

                } else {
                    $chitietdonhang = new Chitietdonhang();
                    $chitietdonhang->id_donhang = $donhang->id;
                    $chitietdonhang->id_sanpham = $item['id'];
                    $chitietdonhang->soluong = $item['qty'];
                    $chitietdonhang->dongia = $item['dongia'];
                    $chitietdonhang->save();
                }


            }
            $data1 = Donhang::with('chitietdonhang')->findOrFail($donhang->id);
            $data = array('donhang' => $data1, 'user' => $user);
        // Mail::to($user['email'])->send(new XacNhanDonHang($data));
            Mail::send('mail.mailthanhtoan', $data, function ($message) {
                $message->to(Auth::user()->email, Auth::user()->name);
                $message->subject('Đơn hàng của bạn!');
            });
            $donhangthongbao = Donhang::with('user', 'chitietdonhang')->findOrFail($donhang->id);
            $chitietthongbao = Chitietdonhang::with('sanpham')->where('id_donhang', $donhang->id)->get();
            $userkhachhang = Auth::user();
            $useradmin->notify(new ThongBaoDatHang($data1, $userkhachhang));
            return response(['thongbao' => 'thanhcong', 'captcha' => $captcha]);
        }


    }
    //thongbao
    public function getNotification($id, $id_user, $item)
    {
        $product = Product::findOrFail($id);
        $user = User::findOrFail($id_user);
        foreach ($user->unreadNotifications as $value) {
            if ($value->id == $item) {
                $value->markAsRead();
            }
        }

        return view('shownotifi', compact('product', 'user'));
    }
    public function getAllNotification($id)
    {
        $user = User::findOrFail($id);
        $user->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
