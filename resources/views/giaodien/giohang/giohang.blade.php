@extends('master') 
@section('title','Giỏ hàng')
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/shop/cart.css')}}">
{{-- <link rel="stylesheet" href="{{asset('public/layout/assets/css/shop/checkout.css')}}"> --}}
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
              <li class="active">Chi tiết giỏ hàng</li>
            </ol><!-- /.breadcrumb -->
          </div>
  
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
</section><!-- /.page-name-sec -->
<section class="cart-section">
  <div class="section-padding">
    <chitietgiohang 
    :cartcount="totalItems" 
    :cart="cart" 
    :carttotal="cartTotal" 
    :totalitems="totalItems" 
    home={{route('home')}} 
    thanhtoan={{route('giaodien.giohang.thanhtoan')}}
    >
  </chitietgiohang>
    
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.cart-section -->
@endsection