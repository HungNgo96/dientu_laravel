@extends('master')
@section('title') Reset mật khẩu
@endsection
@section('header')
    @include('layout.header')
@endsection
 
@section('footer')
    @include('layout.footer')
@endsection
 
@section('content') 
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
                  <li class="active">Đặt lại mật khẩu</li>
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
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Rest mật khẩu</div>
                                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{route('giaodien.getdangky')}}">Đăng ký</a></div>
                            </div>
                            <div class="panel-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        Chúng tôi đã gửi liên kết đặt lại mật khẩu qua email của bạn!
                                </div>
                                @endif
                                <form  class="form-horizontal" role="form" method="POST" action="{{route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input  class="form-control" id="email" type="email" name="email" placeholder="Nhập email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- Button -->
                                        <div class="col-md-offset-3 col-md-9 buttons">
                                            <button id="btn-signup" type="submit" class="btn light-green semi-round btn-sm">Gửi</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 control">
                                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                                Chúng tôi sẽ gửi cho bạn một email có liên kết để đặt lại mật khẩu của bạn.
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection