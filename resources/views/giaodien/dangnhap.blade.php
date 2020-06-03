@extends('master') 
@section('title','Đăng nhập')
@section('icon')
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
            
          </p><!-- /.description -->
        </div>

        <div class="col-sm-5">
          <ol class="breadcrumb text-right">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="active">Đăng nhập</li>
          </ol><!-- /.breadcrumb -->
        </div>

      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.section-padding -->
</section><!-- /.page-name-sec -->
<section class="login-section">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-2 "></div>
        <div class="col-md-8 ">
          <div class="sign-in bg-gray">
            <h2 class="title">Đăng nhập</h2>
            
            @if (session('status1'))
            <ul>
              <li class="text-danger"> {{ session('status1') }}</li>
            </ul>
            @endif 
            @if (count($errors) >0)
                <ul>
                  @foreach($errors->all() as $error)
                  <li class="text-danger"> {{ $error }}</li>
                  @endforeach
                </ul>
               
            @endif
            @if (session('status'))
            <ul>
              <li class="text-danger"> {{ session('status') }}</li>
            </ul>
            @endif 
            <form class="sign-in-form" id="sign-in-form" action="{{route('giaodien.getdangnhap')}}" method="post">
              {{ csrf_field() }}
              <p class="form-input">
                <input type="text" name="email" value="{{old('email')}}" placeholder="name / Email" autocomplete="new-password" />
              </p>
              <p class="form-input">
                <input type="password" name="password"  value="{{old('password')}}" placeholder="Password" autocomplete="new-password" />
              </p>
              <p class="form-input">
                <input type="submit" class="btn" value="Đăng nhập" />
              </p>
              <p class="checkbox pull-left">
                <input name="rememberme" type="checkbox" class="rememberme" value="Ghi nhớ" checked /> Ghi nhớ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('giaodien.getdangky')}}"  title="Đăng ký">Đăng ký</a>
                <a href="{{ route('password.request') }}" class="pull-right" title="Quên mật khẩu">Quên mật khẩu</a>
              </p>
              <p class="checkbox pull-left">
                
                
              </p>
            </form>

            <div class="login-social">
              <a href="{{ url('/auth/facebook') }}"><button class="btn facebook"><i class="fa fa-facebook"></i> Đăng nhập với Facebook </button></a>
              <a href="{{ url('/auth/google') }}"><button style="background-color:#DD4B39"><i class="fa fa-google"></i> Đăng nhập với Google </button></a>
             
            </div><!-- /.login-social -->
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
<!--/.login-section-->
@endsection