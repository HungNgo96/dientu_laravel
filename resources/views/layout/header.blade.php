<header id="masthead" class="masthead">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-5 top-left text-left">
          <p class="top-contact">
            <i class="ti-email"></i><span><a href="#">hirolap96@gmail.com</a></span>
            <i class="ti-mobile"></i><span>0903 984 976</span>
          </p>
          <!-- /.top-contact -->

        </div>
        <!-- /.top-left -->

        <div class="col-sm-7 top-right text-right">
          @if(Auth::check() && Auth::user()->level == 1) Xin chào khách hàng,
          <div class="my-account dropdown">
            <a href="#">{{Auth::user()->name}}<i class="ti-user"></i></a>
            <ul class="unsorted-list">
              <li><a href="{{route('giaodien.thongtinnguoidung')}}">Thông tin</a></li>
              <li><a href="{{route('giaodien.giohang.chitietgiohang')}}">Giỏ hàng</a></li>
              <li><a href="{{route('giaodien.giohang.thanhtoan')}}">Thanh toán</a></li>
              <li><a href="{{route('giaodien.getdangxuat')}}">Đăng xuất</a></li>
            </ul>
          </div>
          <!-- /.my-account -->
          @elseif(Auth::check() && Auth::user()->level == 0)
          <div class="my-account dropdown">
            <a href="#">{{Auth::user()->name}}<i class="ti-user"></i></a>
            <ul class="unsorted-list">
              <li><a href="{{route('giaodien.thongtinnguoidung')}}">Thông tin</a></li>
              
              <li><a href="{{route('admin.dashboard')}}">Trang quản lý</a></li>
              <li><a href="{{route('giaodien.getdangxuat')}}">Đăng xuất</a></li>
            </ul>
          </div>

          
          @else
          <div class="checkout"><a href="{{route('giaodien.getdangnhap')}}">Đăng nhập </a></div>

          <div class="checkout"><a href="{{route('giaodien.getdangky')}}">Đăng ký </a></div>
        </div>
        <!-- /.top-right -->
        @endif
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->

  <div class="header-middle">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h1><a class="navbar-brand hidden-xs" href="{{route('home')}}">Hirolap</a></h1>
        </div>
        <div class="col-sm-7">
          <div class="top-search-form">
            <form action="{{route('giaodien.sanpham.timkiem')}}" method="post" class="menu-form">
              @csrf
              
              <fieldset>
                <select name="category" id="category">
                  <option selected="selected">Tìm kiếm:</option>
                </select>
              </fieldset>
        
              <input type="text" placeholder="Nhập từ khoá" class="form-control" name="tukhoa">
              <button type="submit" class="btn">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </div>
          {{--  <tim-kiem timkiem="{{route('giaodien.sanpham.timkiem')}}">

          </tim-kiem>  --}}
          <!-- /.top-search-form -->
        </div>

        <cart-count 
        :cartcount="totalItems" 
        :cart="cart" :carttotal="cartTotal" 
        :totalitems="totalItems" 
        chitietgiohang={{route('giaodien.giohang.chitietgiohang')}} 
        assetmaytinh={{asset( 'public/image/maytinh/')}} 
        assetdienthoai={{asset( 'public/image/dienthoai/')}}
        thanhtoan = {{route('giaodien.giohang.thanhtoan')}}
        >
        </cart-count>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-middle -->

  <div class="header-bottom">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
              <i class="fa fa-bars"></i>
            </button>
        <a class="navbar-brand visible-xs" href="./">
              Hirolap
            </a>
        <!-- /.navbar-brand -->
      </div>

      <nav id="main-menu" class="menu collapse navbar-collapse pull-left">
        <ul class="nav navbar-nav">
          <li class="menu-item menu-item-has-children">
            <a href="{{route('home')}}">Trang chủ</a>

          </li>

          <li class="menu-item menu-item-has-children menu-item-has-mega-menu">
            <a href="{{route('giaodien.sanpham.sanpham')}}">Sản phẩm</a>
            <ul class="mega-menu sub-menu">
              <li>
                <div class="container">
                  <div class="menu-item col-sm-3">
                    <h6 class="menu-title">Điện thoại</h6>
                    <ul class="menu-list">
                      <li><a href="{{route('giaodien.sanpham.danhsachdienthoai')}}">Tất cả điện thoại</a></li>
                      <?php $loaidt = App\Loaisanpham::where('phanloai','dt')->get();?>
                      @foreach ($loaidt as $item)
                      <li><a href="{{route('giaodien.sanpham.loaisanpham',$item->id)}}">{{$item->tenloai}}</a></li>
                      @endforeach
                      
                      
                    </ul>
                  </div>

                  <div class="menu-item col-sm-3">
                    <h6 class="menu-title">Máy tính</h6>

                    <ul class="menu-list">
                      <li><a href="{{route('giaodien.sanpham.danhsachmaytinh')}}">Tất cả máy tính</a></li>
                      <?php $loaimt = App\Loaisanpham::where('phanloai','mt')->get();?>
                      @foreach ($loaimt as $item)
                      <li><a href="{{route('giaodien.sanpham.loaisanpham',$item->id)}}">{{$item->tenloai}}</a></li>
                      @endforeach
                      
                    </ul>
                  </div>



                  <div class="menu-item col-sm-3">
                    <div class="menu-content">
                      <a href="#">
                            <img src="{{asset('public/layout/images/menu/shop.png')}}" alt="Image">
                            <h3 class="content-title">
                              <span>-65%</span>
                              Discount
                            </h3>
                          </a>
                    </div>
                    <!-- /.menu-content -->
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <li class="menu-item menu-item-has-children">
            <a href="#">Thương hiệu</a>
            @php
                $thuonghieu = App\Hangsanxuat::all();
            @endphp
            
            <ul class="sub-menu">
                @foreach ($thuonghieu as $item)
                <li><a href="{{route('giaodien.sanpham.hangsanxuat',$item->id)}}">{{$item->tenhangsanxuat}}</a></li>
                @endforeach
              
            </ul>
          </li>
          <li class="menu-item"><a href="{{route('giaodien.lienhe')}}">Chính sách & liên hê </a></li>
          <li class="menu-item"><a href="{{route('giaodien.thongtin')}}">Thông tin</a></li>

        </ul>
        <!-- /.navbar-nav -->
      </nav>
      <!-- /.navbar-collapse -->

      <div class="menu-social pull-right">
        <a href="https://www.facebook.com/HIROlap.vn/"><i class="ti-facebook"></i></a>
      </div>
      <!-- /.menu-social -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-bottom -->

</header>
<!-- /#masthead -->