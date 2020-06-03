@extends('masteradmin')
@section('title','Danh sách đơn hàng lỗi')
@section('page','Quản lý đơn hàng lỗi')
@section('pageheader','Quản lý đơn hàng lỗi')
@section('icon',"../../public/icon/dienthoai.png")
@section('content')
@php
    $sanphamloi = App\Sanphamloi::with('sanpham')->get();
@endphp
        <san-pham-loi
        :sanphamloi="{{$sanphamloi}}"
        ></san-pham-loi>

@endsection