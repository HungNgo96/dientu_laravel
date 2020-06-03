<footer class="site-footer">
    <div class="footer-top">
      <div class="section-padding">
        <div class="container">
          <div class="row">

            <div class="col-md-3 col-sm-6">
              <div class="widget widget_about_us">
                <h4 class="widget-title">Hirolap</h4>
                <div class="widget-details">
                  <p class="description">
                    Chào mừng bạn đến với shop điên thoại và laptop Hirolap
                        </p><!-- /.description -->
                  <address>
                    180 Cao Lỗ Đại học Công nghệ Sài Gòn
                  </address>
                  <span>0903 984 976</span>
                  <span>hirolap96@gmail.com</span>
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>

            <div class="col-md-2 col-sm-6">
              <div class="widget widget_useful_links">
                <h4 class="widget-title">Thông tin</h4>
                <div class="widget-details">
                  <span><i class="ti-control-record"></i><a href="#">Thông tin</a></span>
                  <span><i class="ti-control-record"></i><a href="#">Chính sách và liên hệ</a></span>
                  <span><i class="ti-control-record"></i><a href="#">Điều khoản</a></span>
                 
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>
            @php
                $loaisanpham = App\Loaisanpham::all();
            @endphp
            <div class="col-md-2 col-sm-6">
              <div class="widget widget_shop_links">
                <h4 class="widget-title">Danh mục</h4>
                <div class="widget-details">
                  @foreach ($loaisanpham as $item)
                  <span><i class="ti-control-record"></i><a href="{{route('giaodien.sanpham.loaisanpham',$item->id)}}">{{$item->tenloai}}</a></span>
                  @endforeach
                  
                  
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>
            <div class="col-md-5 col-sm-6" >
              <div class="widget widget_useful_links" >
                <h4 class="widget-title">Trang facebook </h4>
                <br>
              
           
                <iframe  src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FHIROlap.vn%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=353265685446702" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FHIROlap.vn%2F&tabs=timeline&width=468&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=353265685446702" width="468" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
              </div><!-- /.widget -->
            </div>

            {{--  <div class="col-md-4 col-sm-6">
              <div class="widget widget_instagram_feed">
                <h4 class="widget-title">Hình ảnh</h4>
                <div class="widget-details">
                  <a href="#"><img src="{{asset('public/layout/images/instagram/1.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/2.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/3.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/4.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/5.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/6.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/7.png')}}" alt="Instagram Image"></a>
                  <a href="#"><img src="{{asset('public/layout/images/instagram/8.png')}}" alt="Instagram Image"></a>
                </div><!-- /.widget-details -->
              </div><!-- /.widget -->
            </div>  --}}

          </div>
        </div>
      </div>
    </div><!-- /.footer-top -->

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-left">
            <div class="copyright">
              © <a href="{{route('home')}}">Hirolap</a> 2018 </a>
            </div><!-- /.copyright -->
          </div>

          <div class="col-sm-5 text-right">
            <div class="payment-list">
              <a href="#"><img src="{{asset('public/layout/images/payment/1.png')}}" alt="Payment Logo"></a>
              <a href="#"><img src="{{asset('public/layout/images/payment/2.png')}}" alt="Payment Logo"></a>
              <a href="#"><img src="{{asset('public/layout/images/payment/3.png')}}" alt="Payment Logo"></a>
              <a href="#"><img src="{{asset('public/layout/images/payment/4.png')}}" alt="Payment Logo"></a>
              <a href="#"><img src="{{asset('public/layout/images/payment/5.png')}}" alt="Payment Logo"></a>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
  </footer>
