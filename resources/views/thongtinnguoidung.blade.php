@extends('master') 
@section('title') Thông tin người dùng {{Auth::user()->name}}
@endsection
 
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/css/thongtinnguoidung.css')}}">
<section class="page-name-sec page-name-sec-01">
  <div class="section-padding">
    <div class="container">

      <!-- /.page-title -->

      <div class="row">
        <div class="col-sm-7">
          <p class="description">

          </p>
          <!-- /.description -->
        </div>

        <div class="col-sm-5">
          <ol class="breadcrumb text-right">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="active">Thông tin người dùng</li>

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
<section class="shop-contents">
  <div class="section-padding">
    <div class="container">
      <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
          <ul class="nav nav-tabs padding-18">
            <li class="active">
              <a data-toggle="tab" href="#home">
                <i class="green ace-icon fa fa-user bigger-120"></i>
                Thông tin người dùng
              </a>
            </li>
            @if(Auth::user()->level == 1) 
            <li>
              <a data-toggle="tab" href="#feed">
                <i class="orange ace-icon fa fa-shopping-cart bigger-120"></i>
                Đơn hàng
              </a>
            </li>
            @endif


          </ul>

          <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane in active">
              <div class="row">
                <div class="col-xs-12 col-sm-3 center">
                  <span class="profile-picture">
                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="http://bootdey.com/img/Content/avatar/avatar6.png">
                  </span>

                  <div class="space space-4">
                    <a href="{{route('giaodien.getdangxuat')}}"> Đăng xuất <i class="fa fa-sign-out"></i></a>
                  </div>



                </div>
                <!-- /.col -->
                @php 
                if(Auth::user()) { $user = Auth::user(); } 
                @endphp
                <div class="col-xs-12 col-sm-9">
                  <h4 class="blue">
                    <span class="middle"></span>

                    <span class="label label-purple arrowed-in-right">
                      <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                      online
                    </span>
                  </h4>

                  <div class="profile-user-info">
                    <div class="profile-info-row">
                      <div class="profile-info-name"> Tên </div>

                      <div class="profile-info-value">
                        <span>{{$user->name}}</span>
                      </div>
                    </div>
                    <div class="profile-info-row">
                      <div class="profile-info-name"> Email </div>

                      <div class="profile-info-value">
                        <span>{{$user->email}}</span>
                      </div>
                    </div>
                    <div class="profile-info-row">
                      <div class="profile-info-name"> SĐT </div>

                      <div class="profile-info-value">
                        <span>{{$user->sdt}}</span>
                      </div>
                    </div>
                    <div class="profile-info-row">
                      <div class="profile-info-name"> Giới tính </div>

                      <div class="profile-info-value">

                        @if($user->gioitinh == 0)
                        <span> Nam</span> 
                        @else
                        <span> Nữ</span>
                         @endif
                      </div>
                    </div>
                    <div class="profile-info-row">
                      <div class="profile-info-name">Địa chỉ</div>
  
                      <div class="profile-info-value">
  
                        <span>{{$user->diachi}}</span>
  
                      </div>
                    </div>
                  </div>
                 

                  <div class="hr hr-8 dotted"></div>

                  <thong-tin-nguoi-dung :user="{{$user}}">

                  </thong-tin-nguoi-dung>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="space-20"></div>

              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="widget-box transparent">


                  </div>
                </div>
              </div>
            </div>
           
           
            @if(Auth::user()->level == 1 )
              <div id="feed" class="tab-pane">
                <div class="profile-feed row">
                  <div class="col-sm-12">

                    <div class="container mt-3">
                      <h2>Thông tin đơn hàng </h2>
                      <br>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#menu0"><strong>Chờ duyệt</strong></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu1"><strong>Đã duyệt</strong></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu2"><strong>Đang giao</strong></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu3"><strong>Hoàn thành</strong></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu4"><strong>Huỷ</strong></a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      @php $donhang = App\Donhang::withCount('chitietdonhang')->with('chitietdonhang','user')->where('id_user',$user->id)->where('trangthai',0)->get();
                      $daduyet = App\Donhang::withCount('chitietdonhang')->with('chitietdonhang','user')->where('id_user',$user->id)->where('trangthai',1)->get();
                      
                      $danggiao = App\Donhang::withCount('chitietdonhang')->with('chitietdonhang','user')->where('id_user',$user->id)->where('trangthai',2)->get();
                      $hoanthanh = App\Donhang::withCount('chitietdonhang')->with('chitietdonhang','user')->where('id_user',$user->id)->where('trangthai',3)->get();
                      $huy = App\Donhang::withCount('chitietdonhang')->with('chitietdonhang','user')->where('id_user',$user->id)->where('trangthai',4)->get();
                      $sanpham = App\Sanpham::select('id','tensp')->get(); 
                      @endphp
                      <div class="tab-content" style="width: 1200px;">
                        <div id="menu0" class="container tab-pane active"><br>
                          <h3>Chờ duyệt </h3><br>
                          <cho-duyet-nguoi-dung :user="{{$user}}" :donhang="{{$donhang}}" :sanpham="{{$sanpham}}">

                          </cho-duyet-nguoi-dung>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                          <h3>Đã duyệt</h3><br>
                          <da-duyet-nguoi-dung :user="{{$user}}" :daduyet="{{$daduyet}}" :sanpham="{{$sanpham}}" >
                          </da-duyet-nguoi-dung>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                          <h3>Đang giao</h3><br>
                          <dang-giao-nguoi-dung :user="{{$user}}" :danggiao="{{$danggiao}}" :sanpham="{{$sanpham}}">
                          </dang-giao-nguoi-dung>
                        </div>
                        <div id="menu3" class="container tab-pane fade"><br>
                          <h3>Hoàn thành</h3><br>
                          <hoan-thanh-nguoi-dung :user="{{$user}}" :hoanthanh="{{$hoanthanh}}" :sanpham="{{$sanpham}}">
                          </hoan-thanh-nguoi-dung>
                        </div>
                        <div id="menu4" class="container tab-pane fade"><br>
                          <h3>Huỷ</h3><br>
                          <huy-nguoi-dung :user="{{$user}}" :huy="{{$huy}}" :sanpham="{{$sanpham}}">
                          </huy-nguoi-dung>
                        </div>
                      </div>
                    </div>


                  </div>
                  <!-- /.col -->

                </div>
                <!-- /.row -->

                <div class="space-12"></div>

                <div class="center">

                </div>
              </div>
           
            @endif


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection