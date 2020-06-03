<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhanviengiaohang;
use App\Giaohang;
use App\User;
use Hash;

class NhanvienController extends Controller
{
    //nhan vien quan ly
    public function getNhanvienquanly()
    {
        $nhanvienquanly = User::where('level', '>', 2)->get();
        return $nhanvienquanly;
    }
    public function getViewNhanvienquanly()
    {
        return view('admin.nhanvienkhachhang.nhanvienquanly');
    }
    public function postNhanvienquanly(Request $request)
    {
        $user = new User();
        $this->validate($request, [
            'name'=>'required',
            'password' => 'required|same:configpassword',
            'email' => 'required|email|unique:users,email',
            'level' => 'required',
            'diachi' => 'required',
            'gioitinh' => 'required',
            'sdt' => 'required|max:10',
            'configpassword' => 'required',

        ], [
            'name.required'=>'Chưa nhập tên nhân viên',
            'email.unique'=>'Email đã tồn tại',
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Sai định dạng email',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.same'=>'Mật khẩu xác nhận không đúng',
            'level.required'=>'Chưa chọn vai trò',
            'diachi.required'=>'Chưa nhập địa chỉ',
            'gioitinh.required'=>'Chưa chọn giới tính',
            'sdt.required'=>'Chưa nhập số điện thoại',
            'sdt.max'=>'Số điện thoại phải 10 số',
            'configpassword.required'=>'Chưa nhập xác nhận mật khẩu',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');
        if ($request->input('level') == 3) {
            $user->vaitro = "Nhân viên hỗ trợ";
        } else if ($request->input('level') == 4) {
            $user->vaitro = "Nhân viên quản lý đơn hàng";
        } else if ($request->input('level') == 5) {
            $user->vaitro = "Nhân viên quản lý sản phẩm";
        }
        $user->diachi = $request->input('diachi');
        $user->gioitinh = $request->input('gioitinh');
        $user->sdt = $request->input('sdt');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = $request->_token;
        $user->save();
        return response(['message'=>'Thành công']);

    }
    public function putNhanvienquanly($id,Request $request){
        $user= User::findOrFail($id);
        $this->validate($request,[
            'password' => 'required|same:configpassword',
            'configpassword' => 'required',
        ],[
            'password.required'=>'Chưa nhập mật khẩu',
            'password.same'=>'Mật khẩu xác nhận không đúng',
            'configpassword.required'=>'Chưa nhập xác nhận mật khẩu',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');
        if ($request->input('level') == 3) {
            $user->vaitro = "Nhân viên hỗ trợ";
        } else if ($request->input('level') == 4) {
            $user->vaitro = "Nhân viên quản lý đơn hàng";
        } else if ($request->input('level') == 5) {
            $user->vaitro = "Nhân viên quản lý sản phẩm";
        }
        $user->diachi = $request->input('diachi');
        $user->gioitinh = $request->input('gioitinh');
        $user->sdt = $request->input('sdt');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = $request->_token;
        $user->save();
        return response(['message'=>'Thành công']);
    }
    public function deleteNhanvienquanly($id){
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
            return response(['message'=>'Thành công']);
        }
    }

    //nhan vien giao hang
    public function getNhanvien()
    {
        return view('nhanvien.nhanvien');
    }
    public function getDanhsachnhanvien()
    {
        return view('admin.nhanvienkhachhang.nhanvien');
    }
    public function index()
    {
        return Nhanviengiaohang::all();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'sdt' => 'required|max:10',
            'tennv' => 'required',
            'gioitinh' => 'required',
            'diachi' => 'required',

        ], [
            'sdt.max' => 'Số điện thoại chỉ được 10 số.',
            'tennv.required' => 'Chưa nhập tên nhân viên',
            'gioitinh.required' => 'Chưa chọn giới tính',
            'diachi.required' => 'Chưa nhập địa chỉ',
            'sdt.required' => 'Chưa nhập sdt',

        ]);
        $nhanvien = new Nhanviengiaohang();
        $nhanvien->tennv = $request->input('tennv');
        $nhanvien->gioitinh = $request->input('gioitinh');
        $nhanvien->sdt = $request->input('sdt');
        $nhanvien->diachi = $request->input('diachi');
        $nhanvien->save();
        return response(['result' => 'success']);

    }
    public function delete($id)
    {
        $nhanvien = Nhanviengiaohang::findOrFail($id);
        $giaohang = Giaohang::where('id_nhanvien', $nhanvien->id)->where('trangthai',1)->get();
        $count = count($giaohang);
        if ($count > 0) {

            return response(['result' => 'success', 'count' => $count]);
        } else {
            $nhanvien->delete();
            return response(['result' => 'fail', 'count' => $count]);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sdt' => 'max:10'
        ], [
            'sdt.max' => 'Số điện thoại chỉ được 10 số.'
        ]);
        $nhanvien = Nhanviengiaohang::findOrFail($id);
        $nhanvien->tennv = $request->input('tennv');
        $nhanvien->gioitinh = $request->input('gioitinh');
        $nhanvien->sdt = $request->input('sdt');
        $nhanvien->diachi = $request->input('diachi');
        $nhanvien->save();
        return response(['result' => 'success']);
    }
}
