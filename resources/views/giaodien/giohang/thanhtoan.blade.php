@extends('master') 
@section('title','Thanh toán')
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/shop/checkout.css')}}">
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
            <li class="active">Thanh toán</li>
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
<section class="checkout-section">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-7">

          @if(!Auth::user())
          <div class="methods">
            <div class="returning-customer">
              <h4 class="checkout-title">Xin mời đăng nhập để đặt hàng</h4>
              <p class="description">
                @if (count($errors) >0)
                <ul>
                  @foreach($errors->all() as $error)
                  <li class="text-danger"> {{ $error }}</li>
                  @endforeach
                </ul>

                @endif @if (session('status'))
                <ul>
                  <li class="text-danger"> {{ session('status') }}</li>
                </ul>
                @endif
              </p>
              <!-- /.description -->

              <form method="post" class="login" action="{{route('giaodien.getdangnhap')}}">
                {{ csrf_field() }}
                <input type="text" class="input-text" name="email" value="{{old('email')}}" value="" placeholder="Username / Email">
                <input class="input-text" type="password" name="password" value="{{old('password')}}" placeholder="Password">
                <a href="{{route('giaodien.getdangky')}}" title="Đăng ký">Đăng ký</a>
                <a href="{{ route('password.request') }}" class="pull-right" title="Quên mật khẩu">Quên mật khẩu</a>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <input type="submit" class="btn" name="login" value="Đăng nhập">
                
                
              </form>
              <div class="login-social">
                <a href="{{ url('/auth/facebook') }}"><button class="btn" style="background-color:#3b5998"><i class="fa fa-facebook"></i> Đăng nhập Facebook</button></a>
                <a href="{{ url('/auth/google') }}"><button  class="btn" style="background-color:#DD4B39"><i class="fa fa-google"></i> Đăng nhập Google</button></a>
              </div>
            </div>
            <!-- /.returning-customer -->
          </div>
          <!-- /.methods -->
          @else
          <div class="billing-fields">

            <h3 class="title">Thông tin mua hàng</h3>

            <form action="#" method="get" accept-charset="utf-8" class="billing-form">
              <div class="row">
                <div class="col-sm-12">
                  <label>Tên</label>
                  <input type="text" class="input-text " name="username" placeholder="Tên" value="{{Auth::user()->name}}" disabled>
                </div>
                <div class="col-sm-12">
                  <label>Email</label>
                  <input type="email" class="input-text " name="email" placeholder="Email" value="{{Auth::user()->email}}" disabled>
                </div>
                <div class="col-sm-12">
                  <label>SDT</label>
                  <input type="text" class="input-text " name="sdt" placeholder="Số điện thoại" value="{{Auth::user()->sdt}}" disabled>
                </div>
                <div class="col-sm-12">
                    <label>Địa chỉ</label>
                    <input type="text" class="input-text " name="diachi" placeholder="Địa chỉ" value="{{Auth::user()->diachi}}" disabled>
                </div>



              </div>
            </form>
          </div>
          <!-- /.billing-fields -->
          @endif


        </div>
        @if(Auth::user())
        <thanhtoan 
        :cart="cart"
        :carttotal="cartTotal"
        :totalitem="totalItems"
        :user="{{Auth::user()}}"
        postthanhtoan = "{{route('giaodien.giohang.postthanhtoan')}}"
        >

        </thanhtoan>
        @endif
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.checkout-section -->
@endsection