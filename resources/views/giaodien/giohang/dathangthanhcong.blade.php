@extends('master') 
@section('title','Giỏ hàng')
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
            <li class="active">Thông tin đặt hàng thành công</li>
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
<div class="container" > 
  <table class="table">
      <caption style="text-align:center">Thông tin đơn hàng đặt thành công</caption>
    <thead>
      <tr>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Đon giá</th>
        <th scope="col">Số lượng</th>
       
      </tr>
    </thead>
    <tbody>
      {{--  @foreach ($chitietthongbao as $item)
      <tr>
        <th scope="row">dd({{$item->sanpham->tensp}})</th>
        <td>{{$item->dongia}}</td>
        <td>{{$item->soluong}}</td>
      </tr>
      @endforeach  --}}
    </tbody>
    <tfoot>
      <tr>
          <td colspan="2">Tổng tiền</td>
          <td>{{$donhangthongbao->tongtien}}</td>
      </tr>
    </tfoot>
  </table>
</div>

<!-- /.page-name-sec -->
@endsection