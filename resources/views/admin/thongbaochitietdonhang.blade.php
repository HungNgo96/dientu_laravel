@extends('masteradmin')
@section('title','Chi tiết thông báo đơn hàng')
@section('page','Thông báo đơn hàng ')
@section('pageheader','Thông báo đơn hàng')
@section('icon',"../../public/icon/user.png")
@section('content')
@php
    $sanpham = App\Sanpham::all();
@endphp
    
        <thong-bao-don-hang  :donhang="{{$donhang}}" :sanpham="{{$sanpham}}"></thong-bao-don-hang>


@endsection