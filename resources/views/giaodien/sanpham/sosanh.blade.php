@extends('master') 
@section('title') Danh sách sản phẩm
@endsection
 
@section('header')
  @include('layout.header')
@endsection


@section('footer')
  @include('layout.footer')
@endsection
 
@section('content')

 @php 
 GLOBAL $loai_ma1; GLOBAL $loai_ma2;
 if(session()->has('data1')){
$loai_ma1=session('data1')->id_matensanpham; 

}
 if(session()->has('data2'))
 { 
   $loai_ma2=session('data2')->id_matensanpham;
  } 
  
@endphp
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
            <li> <a href="{{route('giaodien.sanpham.sanpham')}}">Sản phẩm</a></li>
            <li class="active"> So sánh sản phẩm</li>

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
      <div class="row">
        <div class="product-filter">
          <div class="col-md-4">
            <div class="filter-view">
              <ul role="tablist">
              </ul>
            </div>
            <!-- /.filter-view -->

            <div class="category-select">

            </div>

          </div>

        </div>
        {{--
        <!-- /.product-filter -->--}}
      </div>

      <div class="shop-products">
        <div class="tab-content">
         @include('giaodien.sanpham.menuleft')
          <div class="col-md-9">
            <div class="shop-content">
              <!-- MENU LOC SAN PHAM -->
              <div class="shop-option box-shadow mb-30 clearfix">
                <!-- Nav tabs -->

                <!-- short-by -->
                <div class="short-by f-left text-center">
                
                
                  <p>So Sánh 2 Sản Phẩm </p>
                </div>
                <div class="short-by f-left text-center">
                  <span><strong><a href="{{url('/')}}" title="">Quay lại trang chủ</a></strong></span>
                </div>
                <!-- showing -->
                <div class="showing f-right text-right">
                  <span>Đang Hiển Thị : {{now()}}.</span>
                </div>
              </div>
              <!-- END MENU LOC SAN PHAM -->
              <!-- Tab Content start -->
              <div class="tab-content">
                @if($loai_ma1 == 2) {{-- bảng 1 --}}
                <div class="table-responsive col-md-2">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="img_listspA">Hình Sản Phẩm
                        </td>
                      </tr>
                      <tr>
                        <td>Tên SP</td>
                        
                      </tr>
                      <tr>
                        <td class="align-mid">Màn Hình</td>
                      </tr>
                      <tr class="success">
                        <td class="align-mid" >HĐH</td>
                      </tr>
                      <tr>
                        <td class="align-mid"> Camera</td>
                      </tr>
                      <tr class="warning">
                        <td class="align-mid">CPU</td>
                      </tr>
                      <tr class="info">
                        <td class="align-mid">RAM</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Bộ nhớ</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Pin</td>
                      </tr>
                      <tr>
                        <td>khác</td>
                      </tr>
                      <tr class="danger">
                        <td>Giá</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                @elseif($loai_ma1 ==1)
                <div class="table-responsive col-md-2">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="img_listspA">Hình Sản Phẩm
                        </td>
                      </tr>
                      <tr>
                        <td >Tên SP</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Màn Hình</td>
                      </tr>
                      <tr>
                        <td class="align-mid" >HĐH</td>
                        
                      </tr>
                      <tr class="warning">
                        <td class="align-mid">
                          CPU

                        </td>
                      </tr>
                      <tr class="info">
                        <td class="align-mid">RAM</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Bộ nhớ</td>
                      </tr>
                      <tr class="success">
                        <td class="align-mid">VGA</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Cổng kết nôi</td>
                      </tr>
                      <tr>
                        <td class="align-mid">Pin</td>
                      </tr>
                      <tr>
                        <td >khác</td>
                      </tr>
                      <tr class="danger">
                        <td>Giá</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                @endif {{-- end bảng 1 --}} {{-- sản phẩm 1 --}}
                <div class="table-responsive col-md-5">
                  @if(session()->has('data1')) 
                  @if($loai_ma1 == 2)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Điện thoại 1 </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                      $values = session('data1'); 
                      @endphp

                      <tr>
                        <td><a href="{{route('giaodien.sanpham.sosanh.xoadata1')}}"><span class="badge "><span class="glyphicon glyphicon-remove"></span></span></a><img src="../public/image/dienthoai/{{$values->hinhanh}}" alt="" class="img_listsp"></td>
                      </tr>
                      <tr>
                        <td>{{$values->tensp}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->manhinh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->hdh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->camera}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->cpu}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->ram}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->bonho}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->pin}}</td>
                      </tr>
                      <tr>
                        <td>{{$values->cauhinhdienthoai->thongtinkhac}}</td>
                      </tr>
                      <tr>
                        @if($values->chitietkhuyenmai->count() > 0 && $values->chitietkhuyenmai[0]->trangthai ==0)
                        <td><strong>{{number_format($values->chitietkhuyenmai[0]->dongia_giamgia)}} đ</strong></td>
                        @else
                        <td><strong>{{number_format($values->dongia)}} đ</strong></td>
                        @endif
                      </tr>
                     

                    </tbody>
                  </table>
                  <cart-so-sanh 
                  :sanpham="{{$values}}"
                  ></cart-so-sanh>
                  @elseif($loai_ma1 == 1)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Máy tính 1 </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $values=session('data1') ; 
                      @endphp
                      <tr>
                        <td><a href="{{route('giaodien.sanpham.sosanh.xoadata1')}}"><span class="badge "><span class="glyphicon glyphicon-remove"></span></span></a><img src="../public/image/maytinh/{{$values->hinhanh}}" alt="" class="img_listsp"> </td>
                      </tr>
                      <tr>
                        <td>{{$values->tensp}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->manhinh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->hdh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->cpu}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->ram}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->bonho}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->vga}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->congketnoi}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->pin}}</td>
                      </tr>
                      <tr>
                        <td>{{$values->cauhinhmaytinh->thongtinkhac}}</td>
                      </tr>
                      <tr>

                          @if($values->chitietkhuyenmai->count() > 0 && $values->chitietkhuyenmai[0]->trangthai ==0)
                          <td><strong>{{number_format($values->chitietkhuyenmai[0]->dongia_giamgia)}} đ</strong></td>
                          @else
                          <td><strong>{{number_format($values->dongia)}} đ</strong></td>
                          @endif
                       
                      </tr>
                     
                       
                      

                    </tbody>
                  </table>
                  <cart-so-sanh 
                  :sanpham="{{$values}}"
                  ></cart-so-sanh>
                  @endif 
                  @else
                  <tr class="table-responsive col-md-5" >
                    <td style="margin-right:100px"><a href="{{route('home')}}"><img src="{{asset('public/image/add_sosanh.png')}}"/></a></td>
                  </tr>
                  @endif
                </div>

                {{-- bảng sản phẩm 2 --}}
                <div class="table-responsive col-md-5" >
                @if(session()->has('data2')) 
                  @if($loai_ma2 == 2)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Điện Thoại 2 </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $values = session('data2'); 
                      @endphp
                      <tr>
                        <td><a href="{{route('giaodien.sanpham.sosanh.xoadata2')}}"><span class="badge "><span class="glyphicon glyphicon-remove"></span></span></a><img src="../public/image/dienthoai/{{$values->hinhanh}}" alt="" class="img_listsp"></td>
                      </tr>
                      <tr>
                        <td>{{$values->tensp}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->manhinh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->hdh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->camera}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->cpu}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->ram}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->bonho}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhdienthoai->pin}}</td>
                      </tr>
                      <tr>
                        <td>{{$values->cauhinhdienthoai->thongtinkhac}}</td>
                      </tr>
                      <tr>
                          @if($values->chitietkhuyenmai->count() > 0 && $values->chitietkhuyenmai[0]->trangthai ==0)
                          <td><strong>{{number_format($values->chitietkhuyenmai[0]->dongia_giamgia)}} đ</strong></td>
                          @else
                          <td><strong>{{number_format($values->dongia)}} đ</strong></td>
                          @endif
                      </tr>
                     

                    </tbody>
                  </table>
                  <cart-so-sanh 
                  :sanpham="{{$values}}"
                  ></cart-so-sanh>
                  @elseif($loai_ma2 == 1)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Máy tính 2 </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $values = session('data2'); 
                      @endphp

                      <tr>
                        <td><a href="{{route('giaodien.sanpham.sosanh.xoadata2')}}"><span class="badge "><span class="glyphicon glyphicon-remove"></span></span></a><img src="../public/image/maytinh/{{$values->hinhanh}}" alt="" class="img_listsp"></td>
                      </tr>
                      <tr>
                        <td>{{$values->tensp}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->manhinh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->hdh}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->cpu}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->ram}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->bonho}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->vga}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->congketnoi}}</td>
                      </tr>
                      <tr>
                        <td class="align-mid">{{$values->cauhinhmaytinh->pin}}</td>
                      </tr>
                      <tr>
                        <td>{{$values->cauhinhmaytinh->thongtinkhac}}</td>
                      </tr>
                      <tr>
                          @if($values->chitietkhuyenmai->count() > 0 && $values->chitietkhuyenmai[0]->trangthai ==0)
                          <td><strong>{{number_format($values->chitietkhuyenmai[0]->dongia_giamgia)}} đ</strong></td>
                          @else
                          <td><strong>{{number_format($values->dongia)}} đ</strong></td>
                          @endif
                      </tr>
                      

                    </tbody>
                  </table>
                  <cart-so-sanh 
                  :sanpham="{{$values}}"
                  ></cart-so-sanh>
                  @endif {{-- <a href="{{url('xoa_data_sosanh2')}}" title="xoá dữ liệu 2">Xoá</a> --}} 
                  @else
                  <tr >
                    <td ><a href="{{route('home')}}"><img src="{{asset('public/image/add_sosanh.png')}}"/></a></td>
                  </tr>
                  @endif
                </div>
                {{-- end --}}
              </div>
              <!-- Tab Content end -->
              <!-- shop-pagination start phan trang -->

              <!-- shop-pagination end -->
            </div>
          </div>
          <!-- /.tab-pane -->
        </div>

        <!-- /.tab-content -->
      </div>
      <!-- /.shop-products -->



    </div>
    <!-- /.container -->
  </div>
  <!-- /.section-padding -->
</section>
<!-- /.shop-contents -->
@endsection