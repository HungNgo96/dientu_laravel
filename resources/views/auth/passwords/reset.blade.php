@extends('master')
@section('title') Rest mật khẩu
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
            <h3 class="page-title">Đặt lại mật khẩu</h3><!-- /.page-title -->
      
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
                                <div class="panel-title">Đặt lại mật khẩu</div>
                            </div>
                            <div class="panel-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Chúng tôi đã gửi liên kết đặt lại mật khẩu qua email của bạn!
                                </div>
                                @endif
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}"
                                                required autofocus> @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong style="color:red">Email không tồn tại</strong>
                                                                    </span> @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                required> @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                @if($errors->first('password') == 'The password must be at least 6 characters.')
                                                <strong style="color:red">Mật khẩu không ít hơn 6 kí tự</strong>
                                                @else 
                                                <strong style="color:red">Xác nhận mật khẩu không khớp.</strong>
                                                @endif
                                            </span> @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                                    {{ __('Reset Password') }}
                                                                </button>
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