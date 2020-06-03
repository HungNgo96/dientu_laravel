@extends('master')
@section('title') Liên hệ và chính sách
@endsection
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/pages/contact.css')}}">
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
           
            <li class="active">Liên hệ</li>
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





<section class="contact-section text-center">
  <div class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="item">
            <div class="item-icon"><span class="icon-phone"></span></div>
            <!-- /.item-icon -->
            <div class="item-details">
              <h4 class="item-title">Số điện thoại</h4>
              <!-- /.item-title -->
              <span class="details">
                   
                      0903 984 976 
                    </span>
              <!-- /.details -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="item-icon"><span class="icon-map-pin"></span></div>
            <!-- /.item-icon -->
            <div class="item-details">
              <h4 class="item-title">Địa chỉ</h4>
              <!-- /.item-title -->
              <span class="details">
                     180 Cao Lỗ<br>
                      Đại học Công nghệ Sài Gòn
                    </span>
              <!-- /.details -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="item-icon"><span class="icon-envelope"></span></div>
            <!-- /.item-icon -->
            <div class="item-details">
              <h4 class="item-title">Email</h4>
              <!-- /.item-title -->
              <span class="details">
                      
                      <a href="#">hirolap96@gmail.com</a>
                    </span>
              <!-- /.details -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="section-padding">
        <div class="section-top">
          <h2 class="section-title">Xin chao quý khách<span></span></h2>
          <!-- /.section-title -->
        </div>
        <!-- /.section-top -->

        <p class="section-description">
         Xin cảm ơn các quý khách đã ghé thăm cửa hàng của Hirolap
        </p>
        <!-- /.section-description -->
         @if (session('status'))
            
             <p class="text-success">{{ session('status') }}</p>
            
        @else
        <form action="{{route('giaodien.postlienhe')}}" method="post" class="wpcf7-form contact-form">
            {{ csrf_field() }}
          <div class="contact-input-fields">
            <p>
              <span class="wpcf7-form-control-wrap">
                      <label for="name">Họ và tên*</label>
                      <input type="text" id="name" name="name" value="" class="wpcf7-form-control" required="">
                    </span>
            </p>
            <p>
              <span class="wpcf7-form-control-wrap">
                      <label for="email">Email*</label>
                      <input type="email" id="email" name="email" value="" class="wpcf7-form-control" required="">
                    </span>
            </p>
            <p>
              <span class="wpcf7-form-control-wrap">
                      <label for="url">Địa chỉ facebook</label>
                      <input type="url" id="url" name="url" value="" class="wpcf7-form-control">
                    </span>
            </p>
          </div>
          <!-- /.contact-input-fields -->

          <p>
            <span class="wpcf7-form-control-wrap">
                    <label for="message">Tin nhắn*</label>
                    <textarea id="message" name="message" class="wpcf7-form-control" required=""></textarea>
                  </span>
          </p>

          <p class="choose-table-form">
            <input type="submit" value="Gửi tin nhắn" class="wpcf7-form-control wpcf7-submit">
          </p>
        </form>
        @endif
        <!-- /.contact-form -->
      </div>
      <!-- /.section-padding -->

      <div id="google-map">
        <div class="google-map-section">
          <div class="container-fluid">
              <div class="google-map plr-185">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.95520182126!2d106.67572371452817!3d10.737936192347657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIENhbyBM4buXLCBwaMaw4budbmcgNCwgUXXhuq1uIDgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1526722136069" width="1479" height="300" frameborder="0" style="border:0" zoom="25" allowfullscreen></iframe>
              </div>
          </div>
      </div>
        <!-- /.map-container -->
      </div>
      <!-- /#google-map-->

    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.contact-section -->

@endsection