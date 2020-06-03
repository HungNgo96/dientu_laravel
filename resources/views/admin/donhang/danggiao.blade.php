@extends('masteradmin')
@section('title','Danh sách đơn hàng đang giao')
@section('page','Quản lý đơn hàng đang giao')
@section('pageheader','Quản lý đơn hàng đang giao')
@section('icon',"../../public/icon/dienthoai.png")
@section('content')
@php
    $nhanvien = App\Nhanviengiaohang::all();
@endphp
        <danggiao
        :nhanvien = "{{$nhanvien}}"
        phieugiao={{route('admin.phieugiao.getphieugiao')}}
        hoadon ={{route('admin.phieugiao.gethoadon')}}
        ></danggiao>

@endsection