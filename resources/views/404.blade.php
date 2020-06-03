@extends('master') 
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 

@section('content')
<section class="error-banner text-center">
    <div class="section-padding">
        <div class="container">
            <div class="banner-content">
                <h2 class="main-title">Ồ no!!</h2><!-- /.main-title -->
                <h3 class="sub-title">Trang bạn đang tìm không tìm thấy</h3><!-- /.sub-title -->
                <a href="{{route('home')}}" class="btn">Trang chủ</a><!-- /.btn -->
            </div><!-- /.banner-content -->
        </div><!-- /.container -->
    </div><!-- /.section-padding -->
</section><!-- /.banner -->
<link rel="stylesheet" href="{{asset('public/layout/assets/css/pages/404.css')}}">
@endsection