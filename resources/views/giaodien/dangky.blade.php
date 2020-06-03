@extends('master') 
@section('title') Đăng ký
@endsection
 
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/pages/register.css')}}">
<section class="page-name-sec page-name-sec-01">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <p class="description">

          </p>
          <!-- /.description -->
        </div>

        <div class="col-sm-5">
          <ol class="breadcrumb text-right">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="active">Đăng ký</li>
          </ol>
          <!-- /.breadcrumb -->
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.page-name-sec -->






<section class="login-section">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-2 "></div>
        <div class="col-md-8 ">
          <div class="sign-in bg-gray">
            <h2 class="title">Đăng Ký</h2>
            @if (count($errors) >0)
            <ul>
              @foreach($errors->all() as $error)
              <li class="text-danger"> {{ $error }}</li>
              @endforeach
            </ul>

            @endif @if (session('status'))
            <ul>
              <li class="text-success"> {{ session('status') }}</li>
            </ul>
            @endif
            <form class="signup-form" action="{{route('giaodien.getdangky')}}" method="post">
              {{ csrf_field() }}
              <p class="form-input">
                <input type="text" class="form-control" placeholder="Họ tên" name='txtTen' value="{{old('txtTen')}}">
              </p>
              <p class="form-input">
                <input type="email" class="form-control" placeholder="Email" name='txtEmail' value="{{old('txtEmail')}}">
              </p>
              <p class="form-input">
                <label>Giới tính :</label>
                <label>Nam <input type="radio" name='gioitinh'class="form-control" value =0  ></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Nữ <input type="radio" name='gioitinh' class="form-control" value =1  /></label>
              </p>
              <p class="form-input">
                <input type="number" class="form-control" placeholder="SDT" name='txtSDT' value="{{old('txtSDT')}}">
              </p>
              <p class="form-input">
                <input type="text" class="form-control" placeholder="Địa chỉ" name='txtDiachi' value="{{old('txtDiachi')}}">
              </p>
              <p class="form-input">
                <input type="password" class="form-control" placeholder="Mật khẩu" name='txtPassword' value="{{old('txtPassword')}}">
              </p>

              <p class="form-input">
                <input type="password" class="form-control" placeholder="Xác định mật khẩu" name='txtRePassword' value="{{old('txtRePassword')}}">
              </p>

              <p>
                <input type="submit" class="btn" name="signup-form-submit" value="Đăng ký">

              </p>
              <p class="checkbox pull-left">
                <input name="rememberme" type="checkbox" class="rememberme" value="Remember Me" checked/> Tôi đồng ý
                <a href="#"> Điều khoản</a>
              </p>



            </form>

            <div class="login-social">
              <a href="{{ url('/auth/facebook') }}"><button class="btn facebook"><i class="fa fa-facebook"></i> Đăng ký với Facebook </button></a>
              <a href="{{ url('/auth/google') }}"><button style="background-color:#DD4B39"><i class="fa fa-google"></i> Đăng ký với Google </button></a>
              
            </div>
            <!-- /.login-social -->
          </div>
          <!-- /.sign-in -->
        </div>
        <div class="col-md-2 "></div>


      </div>
      <!-- /.row -->
    </div>
    <!--/.container-->
  </div>
  <!-- /.section-padding -->
</section>
@endsection