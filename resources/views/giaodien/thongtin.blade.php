@extends('master') 
@section('title') Thông tin
@endsection
 
@section('header')
  @include('layout.header')
@endsection
 
@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')
<link rel="stylesheet" href="{{asset('public/layout/assets/css/pages/about-01.css')}}">
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

            <li class="active">Thông tin</li>
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
<section class="intro text-center">
  <div class="section-padding">
    <div class="container">
      <div class="section-top">
        <h3 class="section-title">Chào mừng bạn đến hirolap<span></span></h3>
        <!-- /.section-title -->
      </div>
      <!-- /.section-top -->
      <p class="section-description">
        There was a tray of drinks on a table beside him, from which he filled himself a stiff whisky and soda. He drank it off in
        three gulps, and cracked the glass as he set it down.
      </p>
      <!-- /.section-description -->

      <div class="section-details text-left">
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('public/image/thongtin/about.jpg')}}" alt="Image">
          </div>

          <div class="col-md-6">
            <h4 class="sub-title">
              Đề Tài Xậy Dựng Website Đặt Hàng Online Smartphone và Laptop
            </h4>
            <!-- /.title -->

            <p class="description">
              Khi truy cập internet là một nhu cầu không thể thiếu của cá nhân mỗi người và các công nghệ phục vụ phát triển cho việc truy
              cập internet dễ dàng nhanh chóng thuận lợi mọi lúc mọi nơi càng phát triển mạnh thì nhu cầu để mua sắm một
              thiết bị để truy cập internet là một thứ không thể thiếu như laptop, smartphone, … vốn là những thiết bị được
              ưa chuộng nhất và một công cụ không thể thiếu trong cuộc sống làm việc và giải trí của từng người. Để gắn với
              nhu cầu khổng lồ đó thì các dịch vụ mua bán không thể thiếu và phát triển hơn nữa trong thời đại công nghệ
              4.0, kinh tế số thì để đáp ứng đủ với mọi người thì mua bán trực tuyến là một phương pháp hàng đầu được đầu
              tư một cách mạnh mẽ và là lựa chọn số 1 trong cách mở rộng thị trường và tăng doanh thu khi tất cả mọi người
              chỉ cẩn internet kết nối là có thể mua được hàng với dịch vụ nhanh, bảo mật, tiện lợi và mua ở bất kì đâu.
              <br>
              <br> Những lợi ích của công nghệ 4.0
            </p>
            <!-- /.description -->

            <ul>
              <li>
                  Hoạt động sản xuất nhanh hơn, mọi dữ liệu đượ ctruy cập đầy đủ và mọi quyết định được đưa ra nhanh chóng. Sử dụng sức người hạn chế lại
              </li>
              <li>
                Công việc của con người trở nên hấp dẫn và giảm thiểu được sự nhàm chán.
              </li>
              <li>
                Trong những công việc nguy hiểm con người không phải xuất hiện, bởi đã có công nghệ 4.0 thay thế.
              </li>
              <li>
                Kiểm soát tối đa được những nguyên vật liệu cho đến khi xuất sản phẩm và mang đến cho người dùng.
              </li>
            </ul>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.section-details -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section><section class="our-team text-center">
    <div class="section-padding">
      <div class="container">
        <div class="section-top">
          <h3 class="section-title">Thông tin thành viên<span></span></h3><!-- /.section-title -->
        </div><!-- /.section-top -->
        <p class="section-description">
                </p><!-- /.section-description -->

        <div class="section-details text-center">

          <div class="team-slider">
            <div class="member">
              <div class="member-avatar">
                <img src="{{asset('public/layout/images/about/member/1.png')}}" alt="Member Avatar">
              </div><!-- /.member-avatar -->

              <div class="member-details">
                <div class="bio">
                  <span class="name">Ngô Thanh Hùng</span>
                  <span class="designation">Thiết kế CSDL, code, cắt layout,...</span>
                </div><!-- /.bio -->

                <div class="member-social">
                  
                  <a href="https://www.facebook.com/Mon.DLuffy"><i class="ti-facebook"></i></a>
                
                </div><!-- /.member-social -->
              </div><!-- /.member-hover -->
            </div><!-- /.member -->

          </div><!-- /.team-slider -->
        </div><!-- /.section-details -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /.our-team -->
<!-- /.intro -->
@endsection