<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Hash;
use Auth;
use App\User;


class LoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider,Request $request)
    {   
        // dd($request->input('error_code'));
        if($request->input('code')){
           
            $user = Socialite::driver($provider)->user();

            $authUser = $this->findOrCreateUser($user, $provider);
            Auth::login($authUser, true);
             //dd($user);
            //  if (route('giaodien.giohang.thanhtoan')) {
            //     return redirect()->route('giaodien.giohang.thanhtoan');
            // }
    
            return redirect()->route('home');
        }else if($request->input('error_code')){
            $dataa ="Bạn từ chối đăng nhập vowsi";
            return view('giaodien.dangnhap')->with('status1', 'Bạn từ chối đăng nhập');
            // return response(['message'=>"loi"]);
        }
        
       
    }


    public function findOrCreateUser($user, $provider)
    {
        $level =1;
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'level' => $level,
            'password' => Hash::make(str_random(10)),
            'vaitro'=>'Khách hàng'
        ]);
    }

    public function getDangnhap()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('/');
        } else {
            return view('giaodien.dangnhap');
        }


    }
    public function postDangnhap(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',
            'email.email' => 'Sai định dạng email'
        ]);
        $data = $request->only('email', 'password');
        $ghinho = $request->input('rememberme');

        if (Auth::attempt($data, $ghinho)) {
            if (Auth::check() && Auth::user()->level == 0) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::check() && Auth::user()->level == 2) {
                return redirect()->route('nhanvien.nhanvien');
            } else if (Auth::check() && Auth::user()->level == 3) {
                return redirect()->route('admin.chathotro');
            }else if (Auth::check() && Auth::user()->level == 4) {
                return redirect()->route('admin.donhang.choduyet');
            }else if (Auth::check() && Auth::user()->level == 5) {
                return redirect()->route('admin.sanpham.maytinh');
            }else {
                if (route('giaodien.giohang.thanhtoan')) {
                    return redirect()->back();
                }

                return redirect()->route('home');
            }

        } else {

            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    public function getDangxuat()
    {


        Auth::logout();

        return redirect()->route('home');

    }
    public function getDangky()
    {
        return view('giaodien.dangky');
    }
    public function postDangky(Request $request)
    {
        $this->validate($request, [
            'txtTen' => 'required',
            'txtEmail' => 'required|email|unique:users,email',
            'txtPassword' => 'required|min:6|max:20',
            "txtRePassword" => "required|same:txtPassword",
            'txtDiachi' => 'required',
            'gioitinh' => 'required',
            'txtSDT' => 'required',
            'rememberme' => 'required',

        ], [
            'txtTen.required' => 'Chưa nhập họ tên',
            'txtEmail.required' => 'Chưa nhập email',
            'txtEmail.email' => 'Sai định dạng email',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtPassword.required' => 'Chưa nhập mật khẩu',
            'txtPassword.min' => 'Mật khâu nhiều hơn 6 ký tự',
            'txtPassword.max' => 'Mật khẩu không dài quái 20 ký tự',
            'txtRePassword.required' => 'Chưa nhập xác nhận mật khẩu',
            'txtRePassword.same' => 'Xác nhận mật khẩu không trùng khớp',
            'txtDiachi.required' => 'Chưa nhập địa chỉ',
            'gioitinh.required' => 'Chưa chọn giới tính',
            'txtSDT.required' => 'Chưa nhập số điện thoại',
            'rememberme.required' => 'Chưa tích vào chấp nhận điều khoản',


        ]);
        $user = new User();
        $user->name = $request->txtTen;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPassword);
        $user->vaitro = 'Khách hàng';
        $user->diachi = $request->txtDiachi;
        $user->gioitinh = $request->gioitinh;
        $user->sdt = $request->txtSDT;
        $user->level = 1;
        $user->remember_token = $request->_token;
        $user->save();
        
        Auth::login($user, true);
        // return redirect()->back()->with('status', 'Đăng ký thành công');
        return redirect()->route('home');

    }
}
