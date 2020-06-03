@extends('masteradmin')
@section('title','Xem tất cả thông báo ')
@section('page','Tất cả thông báo')
@section('pageheader','Tất cả thông báo')
@section('icon',"../../public/icon/user.png")
@section('content')
@php
    $sanpham = App\Sanpham::all();
@endphp
    
    <thong-bao-tat-ca  :datathongbao="{{$data}}" :sanpham="{{$sanpham}}"  xemdonhangthongbao="{{route('admin.xemthongbaodonhang')}}"
    
    ></thong-bao-tat-ca>
   
       


@endsection