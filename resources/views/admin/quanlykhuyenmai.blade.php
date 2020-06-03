@extends('masteradmin')
@section('title','Chi tiết khuyến mãi')
@section('page','Chi tiết khuyến mãi')
@section('pageheader','Chi tiết khuyến mãi')
@section('icon',"../../public/icon/user.png")
@section('content')
@php
    $khuyenmai = App\Khuyenmai::all();
@endphp
<quan-ly-khuyen-mai
:dskhuyenmai = "{{$khuyenmai}}"
></quan-ly-khuyen-mai>
@endsection